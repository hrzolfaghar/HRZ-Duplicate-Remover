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
1- Download the compare.php file
