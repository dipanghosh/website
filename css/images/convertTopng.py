import os
#os.chdir("C:\\Users\\Dipan\\Creative Cloud Files\\portfolio_site\\images")
import os  
for fn in os.listdir('.'):
     if fn.endswith(".svg"):
        os.system("magick -size 60 -background rgba(0,0,0,0) "+fn+" "+fn[:-4]+".png")