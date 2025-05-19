<?php 
    include "../include/dbsmain.inc.php";
    
    if(isset($_POST['submit_database'])) {
        $tables = [];
        $result = mysqli_query($db, "SHOW TABLES");
        if (!$result) {
            die('Error executing query: ' . mysqli_error($db));
        }
        
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
        
        ob_start();
        
        foreach ($tables as $table) {
            $createTableResult = mysqli_query($db, "SHOW CREATE TABLE {$table}");
            if (!$createTableResult) {
                die('Error executing query: ' . mysqli_error($db));
            }
            $createTableRow = mysqli_fetch_row($createTableResult);
            echo "{$createTableRow[1]};\n\n";
        
            $result = mysqli_query($db, "SELECT * FROM {$table}");
            if (!$result) {
                die('Error executing query: ' . mysqli_error($db));
            }
            $numFields = mysqli_num_fields($result);
        
            while ($row = mysqli_fetch_row($result)) {
                echo "INSERT INTO `{$table}` VALUES(";
                for ($i = 0; $i < $numFields; $i++) {
                    $row[$i] = $row[$i] ? addslashes($row[$i]) : "NULL";
                    if (isset($row[$i])) {
                        $row[$i] = '"' . $row[$i] . '"';
                    } else {
                        $row[$i] = '""';
                    }
                    if ($i < ($numFields - 1)) {
                        echo $row[$i] . ',';
                    } else {
                        echo $row[$i];
                    }
                }
                echo ");\n";
            }
            echo "\n\n";
        }
        
        $sqlDump = ob_get_clean();
        
        $backupFile = "database_backup_" . date('Y-m-d_H-i-s') . ".sql";
        
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $backupFile . '"');
        header('Content-Length: ' . strlen($sqlDump));
        echo $sqlDump;
        mysqli_close($db);
        exit();
    }
    if(isset($_POST['submit_database_files'])){
        ob_start();
        ini_set("max_execution_time", 0);
        ini_set('memory_limit', '256M');
        
        $zip = new ZipArchive();
        
        // Function to back up tables
        function backup_tables($link, $tables = '*') {
            if ($tables == '*') {
                $tables = array();
                $result = mysqli_query($link, 'SHOW TABLES');
                while ($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', $tables);
            }
        
            foreach ($tables as $table) {
                $filename = $table . '.sql';
                $handle = fopen($filename, 'w');
                $result = mysqli_query($link, 'SELECT * FROM ' . $table);
                $num_fields = mysqli_num_fields($result);
                fwrite($handle, 'DROP TABLE IF EXISTS ' . $table . ';' . PHP_EOL);
                $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE ' . $table));
                fwrite($handle, $row2[1] . ';' . PHP_EOL . PHP_EOL);
        
                while ($row = mysqli_fetch_row($result)) {
                    fwrite($handle, 'INSERT INTO ' . $table . ' VALUES(');
                    $values = array();
                    for ($j = 0; $j < $num_fields; $j++) {
                        $row[$j] = mysqli_real_escape_string($link, $row[$j]);
                        $row[$j] = preg_replace("/\n/", "\\n", $row[$j]);
                        $values[] = '"' . $row[$j] . '"';
                    }
                    fwrite($handle, implode(',', $values) . ");" . PHP_EOL);
                }
                fwrite($handle, PHP_EOL);
                fclose($handle);
            }
        }
        
        backup_tables($db);
        
        foreach (glob("*.sql") as $sqlFile) {
            $zipFileName = $sqlFile . ".zip";
            $res = $zip->open($zipFileName, ZipArchive::CREATE);
            if ($res === TRUE) {
                $zip->addFile($sqlFile);
                $zip->close();
                unlink($sqlFile);
            }
        }
        
        // Create a ZIP file of the directory
        $path = dirname($_SERVER['PHP_SELF']);
        $folder_name = basename($path);
        $zipname = date('Y-m-d') . ".zip";
        $str = "slm-all-backup-" . $zipname;
        
        if ($zip->open($str, ZipArchive::CREATE) !== TRUE) {
            die("Could not open archive");
        }
        
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../$folder_name/"));
        foreach ($iterator as $key => $value) {
            if (!$value->isDir()) {
                $filePath = realpath($key);
                if (strpos($filePath, "slm_backup") === false) {
                    $relativePath = str_replace("../$folder_name/", '', $filePath);
                    $zip->addFile($filePath, $relativePath) or die("ERROR: Could not add file: $key");
                }
            }
        }
        
        $zip->close();
        
        foreach (glob("*.sql.zip") as $file) {
            unlink($file);
        }
        
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$str");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($str);
        unlink($str);
        exit();
    }
    if(isset($_POST['submit_files'])){
        ob_start();
    ini_set("max_execution_time", 0);
    ini_set('memory_limit', '256M');

    $zip = new ZipArchive();

    $path = dirname($_SERVER['PHP_SELF']);
    $folder_name = basename($path);
    $zipname = date('Y-m-d') . ".zip"; 
    $str = "slm-files-backup-" . $zipname;

    if ($zip->open($str, ZipArchive::CREATE) !== TRUE) {
        die("Could not open archive");
    }

    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../$folder_name/"));
    foreach ($iterator as $key => $value) {
        if (!$value->isDir()) {
            $filePath = realpath($key);
            if (strpos($filePath, "slm-backup") === false) {
                $relativePath = str_replace("../$folder_name/", '', $filePath);
                $zip->addFile($filePath, $relativePath) or die("ERROR: Could not add file: $key");
            }
        }
    }

    $zip->close();

    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=$str");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile($str);
    unlink($str);
    exit();
    }
 
?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "top-links.php";?>

</head>

<body>

	<!--start header-->

	<?php include "header.php";?>

	<?php include "sidebar.php";?>

	<!--end sidebar-->
    <main class="main-wrapper">
        <div class="main-content">
    
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Manage SiteDown</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php $_PHP_SELF?>" method="post">
                                <div class="row mb-3">
                                    <div class="col-lg-6 mt-3">
                                        <button type="submit" name="submit_files" class="btn btn-success px-5">Files Backup</button>
                                    </div>
                                </div>
                            </form>
                            <form action="<?php $_PHP_SELF?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6 mt-3 mb-3">
                                        <button type="submit" name="submit_database" class="btn btn-success px-5">Database Backup</button>
                                    </div>
                                </div>
                            </form>
                            
                            <form action="<?php $_PHP_SELF?>" method="post">
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <button type="submit" name="submit_database_files" class="btn btn-success px-5">Files & Database Backup</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
    
            </div>
            <!--end row-->
        </div>
    </main>

	<?php include "footer.php";?>

</body>

</html>