MFT.php
    # add auto load
    # call active class active method on plugin activation
    # call deactive class deactive method on plugin deactivation
    # and then finally initialize calling register_service() of Init class (Init.php)

    Init.php
        # has list of services class name
        # create instance of each service class and call register method

        //services

        Dashboard.php
            # has pages and fields data of admin dashboard page
            # set pages and fields using SettingsApi.php class

            SettingsApi.php
                # register pages & menu
                # register subpages & menu
                # register fields
        
        CustomPostTypeController.php
            # has subpages and fields data of CPT subpage
            # set subpages and fields using SettingsApi.php class
            # register post type

        


        BaseController.php 
            //global bariables and methods to reduce 

        Enqueue.php
            //link js and css into pages
            
        AdminCallbacks.php
            //list of templates to call / return
        ManagerCallbacks.php
            //Different view elements generator like- textbox, checkbox, section text

[]templates
    # all templates
        




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
