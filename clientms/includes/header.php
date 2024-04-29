<div class="header-section">
        <!--menu-right-->
        <div class="top_menu">
          
          <!--/profile_details-->
          <div class="profile_details_left">
            <ul class="nofitications-dropdown">
              <li class="dropdown note dra-down">
                
                <script type="text/javascript">

                  function DropDown(el) {
                    this.dd = el;
                    this.placeholder = this.dd.children('span');
                    this.opts = this.dd.find('ul.dropdown > li');
                    this.val = '';
                    this.index = -1;
                    this.initEvents();
                  }
                  DropDown.prototype = {
                    initEvents : function() {
                      var obj = this;

                      obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        return false;
                      });

                      obj.opts.on('click',function(){
                        var opt = $(this);
                        obj.val = opt.text();
                        obj.index = opt.index();
                        obj.placeholder.text(obj.val);
                      });
                    },
                    getValue : function() {
                      return this.val;
                    },
                    getIndex : function() {
                      return this.index;
                    }
                  }

                  $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        ;
                                });

                  });

                </script>
              </li>
            

              <li class="dropdown note">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="badge blue1">9</span></a>
                <ul class="dropdown-menu two">
                  <li>
                    <div class="notification_header">
                      <h3>vous avez 9 taches en attente</h3>
                    </div>
                  </li>
                  <li><a href="#">
                    <div class="task-info">
                      <span class="task-desc">Base de donnees mise a jour</span><span class="percentage">40%</span>
                      <div class="clearfix"></div>  
                    </div>
                    <div class="progress progress-striped active">
                      <div class="bar yellow" style="width:40%;"></div>
                    </div>
                  </a></li>
                  <li><a href="#">
                    <div class="task-info">
                      <span class="task-desc">Page d'accueil faite</span><span class="percentage">90%</span>
                      <div class="clearfix"></div>  
                    </div>

                    <div class="progress progress-striped active">
                      <div class="bar green" style="width:90%;"></div>
                    </div>
                  </a></li>
                  <li><a href="#">
                    <div class="task-info">
                      <span class="task-desc">Application mobile</span><span class="percentage">33%</span>
                      <div class="clearfix"></div>  
                    </div>
                    <div class="progress progress-striped active">
                      <div class="bar red" style="width: 33%;"></div>
                    </div>
                  </a></li>
                  <li><a href="#">
                    <div class="task-info">
                      <span class="task-desc">Probleme regle</span><span class="percentage">80%</span>
                      <div class="clearfix"></div>  
                    </div>
                    <div class="progress progress-striped active">
                      <div class="bar  blue" style="width: 80%;"></div>
                    </div>
                  </a></li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#">Voir toutes les taches en attente</a>
                    </div> 
                  </li>
                </ul>
              </li>                         
              <div class="clearfix"></div>  
            </ul>
          </div>
          <div class="clearfix"></div>  
          <!--//profile_details-->
        </div>
        <!--//menu-right-->
        <div class="clearfix"></div>
      </div>