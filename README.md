# How does the HRZ Duplicate Remover work?
1- Compares two directories :

   patternDir: the directory used as the pattern & does not change.
   
   victimDir: A directory that is compared to patternDir directory and changes are applied to it.
   
   
2- victimDir directory files that are similar to patternDir directory files will be removed from the victimDir directory.
   
   What do similar files mean?
   
   - Their names are the same.
   - Their contents are the same.
   - Their internal paths are the same.
   - Their Extensions and file types are the same.
    
3- Finally, after deleting similar files if a directory becomes empty, that directory will also be deleted in victimDir directory.

   Directories that are empty from the beginning will not be deleted.

# How to use HRZ Duplicate Remover
1- In the first step, it is better to back up all your files.

2- Download the refiner.php file and place it next to the two directories you want to compare.

3- Open the refiner.php file and enter the names of the directories in the variables and save (In lines 8 and 9).

   sample:
   
   $patternDir = "original";
   
   $victimDir = "check";
   
4- Run the file and enjoy it!
