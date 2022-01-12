<?php
/**
 * @package HRZ Duplicate Refiner
 * @author Hamidreza Zolfaghar hrz.zolfaghar@gmail.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

$patternDir = ""; //The directory used as the pattern & does not change
$victimDir = ""; //The directory that is compared to the pattern directory, Then similar files will be deleted from this folder.


define('DS', DIRECTORY_SEPARATOR);

class Compare
{
    private string $patternDir;
    private string $victimDir;
    private string $basePath;
    private array $filesList = [];

    function __construct($patternDir, $victimDir)
    {
        $this->patternDir = $patternDir;
        $this->victimDir = $victimDir;
        $this->basePath = getcwd();
        echo "Refining similar items in the \"$this->victimDir\" Directory compared to \"$this->patternDir\" Directory ...";
        echo '<br/><br/>';
        $this->filesList($this->basePath . DS . $this->victimDir);
        $this->Refiner();
    }

    function filesList($check)
    {
        # $removePath is the first part of the path that we do not want to be stored in the $filesList array.
        $removePath = $this->basePath . DS . $this->victimDir . DS;

        $items = scandir($check);

        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            } elseif (is_file($check . DS . $item)) {
                $this->filesList[] = str_replace($removePath, '', $check . DS . $item);
            } elseif (is_dir($check . DS . $item)) {
                $this->filesList($check . DS . $item);
            } else {
                exit('Unexpected Error: please contact HRZ.ZOLFAGHAR@GMAIL.COM');
            }
        }
    }

    function Refiner()
    {
        $patternPath = $this->basePath . DS . $this->patternDir;
        $victimPath = $this->basePath . DS . $this->victimDir;

        foreach ($this->filesList as $file) {

            if (file_exists($patternPath . DS . $file)
                && filesize($patternPath . DS . $file) == filesize($victimPath . DS . $file)) {
                $fileDirPath = dirname($victimPath . DS . $file);
                unlink($victimPath . DS . $file);
                echo "File \"" . $victimPath . DS . $file . "\" is similar & removed.";
                echo '<br/>';

                if (count(scandir($fileDirPath)) == 2) {
                    rmdir($fileDirPath);
                    echo "Directory \"" . $fileDirPath . "\" has become an empty directory & removed.";
                    echo '<br/>';
                }
            }
        }
    }

    function __destruct()
    {
        echo '<br/>';
        echo "Refining completed successfully.";
    }
}

new Compare($patternDir, $victimDir);
