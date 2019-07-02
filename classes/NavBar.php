<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavBar
 *
 * @author Dulon
 */
class NavBar {
   
    public function Worked(){
        echo '<aside class="bg-dark lter nav-xs aside hidden-print" id="nav"> 
    <section class="vbox"> <section class="w-f-md scrollable"> 
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2"> 
                <nav class="nav-primary hidden-xs"> 
                    <ul class="nav bg clearfix"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> Discover </li> 
                        
                        <li> <a href="songs.php"> <i class="icon-music-tone-alt icon "></i> 
                                <span class="font-bold">Songs</span> </a> </li>
                                <li> <a href="PicStory.php"> <i class="icon-grid icon "></i> 
                                <span class="font-bold">Photos</span> </a> </li>                                
                        <li> <a href="blog.php"> 
                                <i class="icon-drawer icon "></i> <b class="badge bg-primary pull-right">6</b> 
                                <span class="font-bold">Blog</span> </a> </li> 
                        <li> <a href="sms.php"> 
                                <i class="icon-list icon "></i> <span class="font-bold">SMS</span> </a> </li> 
                                <li> <a href="video.php"> 
                                <i class="icon-social-youtube icon "></i> <span class="font-bold">Videos</span> </a> </li> 
                        <li class="m-b hidden-nav-xs"></li> </ul>
                    <ul class="nav" data-ride="collapse"> 
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted"> With Submenu </li> 
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-music-tone-alt icon "> </i>
                                <span>Songs</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="songs.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Assamese Songs</span>
                                </a> </li>
                                <li > <a href="scat.php?i=Bihu_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Bihu Songs</span> </a>
                                </li>
                                <li > <a href="scat.php?i=Album_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Album Songs</span> </a> 
                                </li> 
                                <li > <a href="scat.php?i=Movie_Songs" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Movie Songs</span> </a> 
                                </li>
                            </ul> </li>
                        <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-disc icon "> </i>
                                <span>User</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="signin.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Signin</span> </a>
                                </li> 
                                <li > <a href="signup.php" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Signup</span> </a> 
                                </li> 
                                <li > <a href="...html" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>..</span> </a> </li>
                            </ul> </li>
                            <li> <a href="#" class="auto"> 
                                <span class="pull-right text-muted"> 
                                    <i class="fa fa-angle-left text"></i> 
                                    <i class="fa fa-angle-down text-active"></i>
                                </span> <i class="icon-bell icon"> </i>
                                <span>Pages</span> </a>
                            <ul class="nav dk text-sm">
                                <li > <a href="page.php?i=1" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>DCMA</span> </a> </li>
                                <li > <a href="page.php?i=2" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Contect Us</span> </a> </li>
                                <li > <a href="page.php?i=3" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>About Us</span> </a> </li> 
                                <li > <a href="page.php?i=4" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Mission</span> </a> </li> 
                                <li > <a href="page.php?i=5" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Privacy Policy</span> </a> </li>
                                <li > <a href="page.php?i=6" class="auto"> <i class="fa fa-angle-right text-xs"></i> <span>Report Abuse File</span> </a> </li> 
                            </ul> </li>
                    </ul>
                </nav> 
            </div> </section> 
    </section> </aside>';
        
    }
    
    public function Admin(){}
    
    public function BrandMager(){
        include '../sidebar/brand_manager.php';
    }
    
    public function SideBarForMixItem(){
        include '../sidebar/mix_item.php';        
    }
    public function EnaManager(){
        include '../sidebar/ena_manager.php';        
    }
    public function Accounts(){
        include '../sidebar/Accounts.php';        
    }
    public function EnaConsignment(){
        include '../sidebar/consignment_ena.php';        
    }
    public function Consignment(){
        include '../sidebar/consignment.php';        
    }
    public function Sale_Details(){
        include '../sidebar/sale_details.php';        
    }
    public function ConsignmentOrders(){
        include '../sidebar/consignment_orders.php';        
    }
    public function ConsignmentEnaOrders(){
        include '../sidebar/consignment_orders_ena.php';        
    }
    public function Dashboard(){
        include '../sidebar/dashboard.php';        
    }
    public function home(){
        include '../sidebar/home.php';        
    }
    
    public function officers(){
        include '../sidebar/officers.php';        
    }
    
    public function home_officers(){
        include '../sidebar/home_oficers.php';        
    }
    public function officers_list_all(){
        include '../sidebar/officers_list_all.php';        
    }
    public function company_list_all(){
        include '../sidebar/company_list_all.php';        
    }
    public function homeIndex(){
        include '../sidebar/home_index.php';        
    }
    
    public function Officers_Index(){
        include '../sidebar/officers_index.php';        
    }
    
    public function homeDistllry(){
        include '../sidebar/home_index_dist.php';        
    }
    
    public function manufactory(){
        include '../sidebar/home_index_menuf.php';        
    }
    
    public function wholesaler(){
        include '../sidebar/home_index_whs.php';        
    }
    
    public function retailers(){
        include '../sidebar/home_index_rtl.php';        
    }


    
    
    
    
}
