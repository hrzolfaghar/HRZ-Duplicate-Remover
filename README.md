# How does the HRZ Duplicate Refiner work?
1- Compares two directories :

   patternDir: the directory used as the pattern & does not change.
   
   victimDir: A directory that is compared to a template directory and changes are applied to it.
   
   
2- victimDir directory files that are similar to those in the patternDir directory will be removed from the victimDir directory.
   
   What does the similar file mean?
   
   - Their name is the same.
   
   - Their content is the same.
   
   - Their internal path is the same.
    
3- Finally, if a directory becomes empty after deleting similar files, that directory will also be deleted if victimDir directory.

   Directories that are empty from the beginning will not be deleted.

# How to use HRZ Duplicate Refiner
1- In the first step, it is better to back up all your files.

2- Download the refiner.php file and place it next to the two directories you want to compare.

3- Open the refiner.php file and enter the names of the directories in the variables and save (In lines 8 and 9).

   sample:
   
   $patternDir = "orginal";
   
   $victimDir = "check";
   
4- And then run the file and enjoy it!
