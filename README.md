cakefest2014
============

###Setting up a minimal development environment
* check requirements here http://book.cakephp.org/3.0/en/installation.html#requirements

####Using Microsoft Azure VM
* login to https://manage.windowsazure.com
* spawn a new virtual machine using New > Compute > Virtual Machine > From Gallery
* next, pick ubuntu 14.04
* next, pick a name, and check "select a password", type a username and password (and remember the password to be used later)
* next, select West or North Europe region, Add 1 Endpoint > add a new one HTTP public: 80 private: 8080
* next, OK and wait
* ssh to the virtual machine, use either the public IP or the name-of-the-vm.cloudapp.net : use the username and password provided
* curl -L https://gist.githubusercontent.com/steinkel/ad4101bbef37ac537001/raw/690a77d45713cbda5bbdb9d2868148a83fa326f0/init.sh |bash
* start CakePHP server using bin/cake server -p 8080 -H azure-private-ip-address
* point your browser to name-of-the-vm.cloudapp.net

####Using Vagrant
* use your preferred Ubuntu 14 box
* Setup port forwarding in Vagrantfile: `config.vm.network :forwarded_port, guest: 8080, host: 8080`
* vagrant up && vagrant ssh
* curl -L https://gist.githubusercontent.com/steinkel/ad4101bbef37ac537001/raw/690a77d45713cbda5bbdb9d2868148a83fa326f0/init.sh |bash
* start CakePHP server using bin/cake server -p 8080 
* point your browser to http://localhost:8080

###Database schema
* https://raw.githubusercontent.com/steinkel/cakefest2015/master/database.sql 
