<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <section class="main">
        <div class="fileManager">   
            <div class="folders">
                <ul>
                    <?php 
                    $folder = './' . $_GET['folder'];
                    if ($_GET['folder'] == 'admin') {
                        $folder = __DIR__;
                    }
                    // die(var_dump($folder));
                    if (is_dir($folder)) {
                        if ($dh = opendir($folder)) {
                            while (($file = readdir($dh)) !== false) {
                                if (is_dir($folder . '/' . $file)) {
                                    echo "<li class='folderList'><a href='/?folder=" . $file . "'><img src='./img/folder_icon.svg' class='folderListIcon'>{$file}</a></li>";
                                }else{
                                    echo "<li class='fileList'><a href='/{$file}'><img src='./img/file_icon.svg' class='fileListIcon'>{$file}</a></li>";
                                }
                                
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="files">
            <ul>
                    <?php 
                    $folder = '../admin/';
                    // die(var_dump(is_dir($folder)));
                    if (is_dir($folder)) {
                        if ($dh = opendir($folder)) {
                            while (($file = readdir($dh)) !== false) {
                                if (is_dir($folder . '/' . $file)) {
                                    echo "<li class='folderList' style='line-height: 23px'>" . filesize($file) . "</li>";
                                }else{
                                    echo "<li class='fileList' style='line-height: 23px'>" . filesize($file) . "</li>";
                                }
                                
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="actions">

            </div>
        </div> 
    </section>
    <form action="explorer.php" method="POST" enctype="multipart/form-data">
        <input type="file" multiple name="files[]">
        <button>Отправить</button>
    </form>
</body>
</html>