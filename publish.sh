
rsync -avr --delete \
   --exclude publish.sh \
   --exclude TODO.md \
   --exclude .git* \
   --exclude README.md \
   ./ ~/svn/moot/trunk

echo "\n~/svn/moot/trunk\n"