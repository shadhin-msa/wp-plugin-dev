MFT.php
    # define plugin details
    # check if wordpress is reading this file not someone else
    # check vendor autoload is available
    # Call Activate on register activation hook
    # Call deactivate on register deactivation hook 
    # Call init to initiate plugin


Inc\init.php
    # return list of classes
    # register service make instance of class and call register method of it
    # create instance from class

Inc\Pages\Admin.php
    # create instance of settingsApi
    # Arrau of pages and subpages
    # Register method used settingsApi to addPages and subpages then register those

    Inc\Api\SettingsApi.php
        # use add action on admin menu hook to call addAdminMenu
        # addPages add param pages in class method
        # addSubpages add param subpages in class method
        # addAdmin menu add page and menu in the admin 

Enqueue.php
    # add script and style in frontend and backend 

SettingsLink.php
    #   Add settings link into plugin list
