
rsync -avr --delete \
   --exclude publish.sh \
   --exclude TODO.md \
   --exclude .git \
   --exclude .gitignore \
   --exclude README.md \
   --exclude .svn \
   ./ ~/svn/moot/trunk

echo "\n~/svn/moot/trunk\n"