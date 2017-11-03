# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "geerlingguy/ubuntu1604"

  config.vm.hostname = "finances"
  config.vm.network :forwarded_port, guest: 80, host: 8052, auto_correct: true
  config.vm.network :forwarded_port, guest: 3306, host: 9952, auto_correct: true
  config.vm.network :forwarded_port, guest: 22, host: 2352, auto_correct: true
  config.vm.network "private_network", ip: "192.168.10.152"

  config.ssh.forward_agent = true

  config.winnfsd.uid = 1
  config.winnfsd.gid = 1

  config.vm.synced_folder "../", "/var/www", nfs: true

  config.vm.provider "virtualbox" do |vb|
    vb.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vb.customize ["modifyvm", :id, "--name", "laravel5.5-base"]
    vb.customize ["modifyvm", :id, "--memory", "2048"]
    vb.customize ["modifyvm", :id, "--vram", "128"]
  end

  config.vm.provision :shell, :path=>"base_script.sh"

end