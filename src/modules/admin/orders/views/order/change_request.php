<div class="content">
     <div  animate-panel>
          <div class="row" >
               <div class="col-sm-12">
                    <?php
                      if (isset($order) && !empty($order)) {
                           ?>  <div class="hpanel">
                                <div class="panel-body">                              
                                     <div class="col-sm-12 no-padding margin_bottom_10">  
                                          <div class="form-holder order_form">
                                               <div class="clearfix margin_bottom_10" ng-show="processing">
                                                    <p class="text-success text-center"> <?= lang('order_processing') ?> 
                                                         <img src="<?php echo base_url(); ?>resource/images/loading-bars.svg" width="36" height="36" alt="<?= lang('loading') ?>">

                                               </div>
                                               <form name="new_order_p1" class="form-horizontal" ng-submit="new_order_p1.$valid && saveOrder()">
                                                    <h3 class="order_title"><?= lang("request_for_change_title") ?>
                                                         <span class="pull-right">
                                                              <a ui-sref="tender_requests.delivery" class="btn-cancel"> <?= lang('cancel_btn') ?></a>

                                                              <button type="submit" class="btn btn-primary btn-sm">
                                                                   <?= lang('submit_btn') ?>                                                  
                                                              </button>         
                                                         </span>
                                                    </h3>
                                                    <fieldset>                                          

                                                         <div class="well col-sm-12">
                                                              <div class="col-sm-6">  
                                                                   <div class="form-group custom-select2">
                                                                        <ui-select ng-model="neworder.type" theme="select2" ng-disabled="disabled" ng-change="set_bulk()" required style="width:100%">
                                                                             <ui-select-match placeholder="<?= lang('order_item_ph') ?>">{{$select.selected.display_name}}</ui-select-match>
                                                                             <ui-select-choices repeat="ordertype in typelist | filter: {display_name: $select.search}">
                                                                                  <div ng-bind-html="ordertype.display_name | highlight: $select.search" class="type_title"></div>
                                                                                  <span ng-bind-html="ordertype.description | highlight: $select.search"></span>
                                                                             </ui-select-choices>
                                                                        </ui-select> 
                                                                        <span class="help-block m-b-none text-danger" ng-show="errors.type">{{errors.type}}</span>

                                                                   </div>
                                                              </div>
                                                              <div class="clearfix"></div>
                                                              <div class="order_dimension" ng-show="neworder.is_bulk">
                                                                   <p><?= lang('order_dimension_caption') ?></p>
                                                                   <div class="clearfix"></div>
                                                                   <div class="col-sm-2">
                                                                        <label><?= lang('order_length') ?></label>
                                                                        <input ng-model="neworder.length" type="text" name="length" class="form-control text-center" ng-change="checkvolume()" ng-pattern="/^[0-9]+(\.[0-9]{1,3})?$/" ng-class="{error:errors.length || new_order_p1.length.$invalid}" ng-disabled="!neworder.is_bulk">
                                                                        <label><?= lang('cm') ?></label>
                                                                        <span class="close_icon"><i class="fa fa-close"></i></span>
                                                                   </div>                                                            
                                                                   <div class="col-sm-2">
                                                                        <label><?= lang('order_breadth') ?></label>
                                                                        <input ng-model="neworder.breadth" type="text" name="breadth" class="form-control text-center" ng-change="checkvolume()" ng-pattern="/^[0-9]+(\.[0-9]{1,3})?$/" ng-class="{error:errors.breadth || new_order_p1.breadth.$invalid}" ng-disabled="!neworder.is_bulk">
                                                                        <label><?= lang('cm') ?></label>
                                                                        <span class="close_icon"><i class="fa fa-close"></i></span>
                                                                   </div>
                                                                   <div class="col-sm-2">
                                                                        <label><?= lang('order_height') ?></label>
                                                                        <input ng-model="neworder.height" type="text" name="height" class="form-control text-center" ng-change="checkvolume()" ng-pattern="/^[0-9]+(\.[0-9]{1,3})?$/" ng-class="{error:errors.height || new_order_p1.height.$invalid}" ng-disabled="!neworder.is_bulk">
                                                                        <label><?= lang('cm') ?></label>
                                                                        <span class="close_icon"><p>=</p></span>
                                                                   </div>
                                                                   <div class="col-sm-3">
                                                                        <label><?= lang('order_volume') ?></label>
                                                                        <input ng-model="neworder.volume" type="text" class="form-control text-center" ng-class="{error:errors.volume}" disabled >
                                                                        <label><?= lang('cm3') ?>
                                                                   </div>
                                                                   <div class="col-sm-3">
                                                                        <label><?= lang('order_weight') ?></label>
                                                                        <input ng-model="neworder.weight" type="text" name="weight" class="form-control text-center" ng-pattern="/^[0-9]+(\.[0-9]{1,3})?$/" ng-class="{error:errors.weight || new_order_p1.weight.$invalid}" ng-disabled="!neworder.is_bulk">
                                                                        <label><?= lang('kg') ?></label>
                                                                   </div>
                                                              </div>
                                                         </div>
                                                         <div class="col-sm-12 no-padding clearfix" style="position: relative;" >
                                                              <div class="col-sm-6 no-padding">
                                                                   <div class="a-box a-box-left">
                                                                        <h2><?= lang('collect_from') ?><img src="<?php echo base_url(); ?>resource/images/address.jpg" class="mycontact" ng-click="show_contact_popup('collect')"></h2>
                                                                        <div class="col-sm-12 address_box">
                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="lock_info">
                                                                                       <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img">
                                                                                       <span>Fields or section with this icon will be displayed only to assigned or awarded courier</span>
                                                                                  </div>
                                                                             </div>
                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.collect_from_l1" class="form-control required" ng-class="{error:errors.collect_from_l1}" placeholder="<?= lang('collect_add_l1') ?>" required>
                                                                                       <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img">
                                                                                       <!-- <span class="help-block m-b-none m-t-none m-l-xs"><?= lang('order_add_l1_info') ?></span> -->
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_from_l1">{{errors.collect_from_l1}}</span>
                                                                                  </div>
                                                                             </div>

                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.collect_from_l2" class="form-control" ng-class="{error:errors.collect_from_l2}" placeholder="<?= lang('collect_add_l2') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_from_l2">{{errors.collect_from_l2}}</span>
                                                                                  </div>
                                                                             </div>

                                                                             <div class="col-sm-6 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text"  ng-model="neworder.collection_zipcode" class="form-control" ng-class="{error:errors.collection_zipcode}" placeholder="<?= lang('collect_zipcode') ?>">
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collection_zipcode">{{errors.collection_zipcode}}</span>
                                                                                  </div>
                                                                             </div> 

                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <select  ng-model="neworder.collect_country" class="form-control " ng-class="{error:errors.collect_country}" placeholder="<?= lang('collect_country') ?>" ng-options="country.code as country.country for country in countrylist" ng-change="getCTimezones(true)" required>
                                                                                            <option value="">--select country--</option>
                                                                                       </select>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_country">{{errors.collect_country}}</span>
                                                                                  </div>
                                                                                  <div class="clearfix"></div>
                                                                                  <div class="col-xs-6 col-sm-4 no-padding"> 
                                                                                       <span class="chk_wrap"> 
                                                                                            <input ng-model="neworder.is_c_restricted_area.a1" type="checkbox" icheck>
                                                                                       </span>
                                                                                       <p>Tuas</p> 
                                                                                  </div>
                                                                                  <div class="col-xs-6 col-sm-4 no-padding"> 
                                                                                       <span class="chk_wrap"> 
                                                                                            <input ng-model="neworder.is_c_restricted_area.a2" type="checkbox" icheck>
                                                                                       </span>
                                                                                       <p>CBD</p> 
                                                                                  </div>
                                                                                  <div class="col-xs-6 col-sm-4 no-padding"> 
                                                                                       <span class="chk_wrap"> 
                                                                                            <input ng-model="neworder.is_c_restricted_area.a3" type="checkbox" icheck>
                                                                                       </span>
                                                                                       <p>Sentosa</p> 
                                                                                  </div>
                                                                                  <div class="col-xs-12 no-padding"> 
                                                                                       <span class="chk_wrap"> 
                                                                                            <input ng-model="neworder.is_c_restricted_area.a4" type="checkbox" icheck>
                                                                                       </span>
                                                                                       <p>Other Restricted Areas <i class="fa fa-info-circle pointer" ng-click="view_restricted_info()"></i></p> 
                                                                                  </div>
                                                                             </div> 

                                                                             <p class="sub_h"><?= lang('contact_person') ?>

                                                                                  <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img"></p>

                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" class="form-control " ng-class="{error:errors.collect_contactname}" ng-model="neworder.collect_contactname" placeholder="<?= lang('contact_name') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_contactname">{{errors.collect_contactname}}</span>
                                                                                  </div>
                                                                             </div>

                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" class="form-control " ng-class="{error:errors.collect_phone}" ng-model="neworder.collect_phone"  placeholder="<?= lang('phone_number') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_phone">{{errors.collect_phone}}</span>
                                                                                  </div>
                                                                             </div> 

                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="email" class="form-control" name="collect_email" ng-class="{error:errors.collect_email || new_order.collect_email.$invalid}" ng-model="neworder.collect_email"  placeholder="<?= lang('order_email') ?>">
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.collect_email">{{errors.collect_email}}</span>
                                                                                  </div>
                                                                             </div> 
                                                                             <p class="sub_h"><?= lang('pickup_time') ?></p>
                                                                             <p class="small-f"><?= lang('pickup_time_info') ?><br><br><br></p>
                                                                             <div class="col-sm-12 no-padding">

                                                                                  <div class="angular_popup collection_timezone_pop pull-right" draggable="true" ng-show="view_collect_timezone_list">  
                                                                                       <h3><?= lang('timezone') ?>
                                                                                            <i class="fa fa-close pull-right" ng-click="cancel_collection_timezone()"></i>
                                                                                       </h3>
                                                                                       <div class="form-holder">                                                                                
                                                                                            <div class="form-group">
                                                                                                 <div class="col-sm-12"> 
                                                                                                      <select  class="form-control required" ng-model="neworder.collect_timezone" ng-change="cancel_collection_timezone()" ng-options="zone as zone.zoneinfo +' (' + zone.offset + ')' for zone in timezones track by zone.zoneinfo">

                                                                                                      </select>
                                                                                                 </div>
                                                                                            </div>
                                                                                       </div>
                                                                                  </div>



                                                                                  <div class="form-group">
                                                                                       <div class="col-xs-12 no-padding">
                                                                                            <select ng-model="collect_shortcuts" class="form-control"  ng-change="setCRange()" ng-options="sc as sc.name for sc in csclist">
                                                                                                 <option value=""><?= lang('custom-collection-period') ?></option>
                                                                                            </select>
                                                                                       </div>
                                                                                       <div class="col-xs-12 col-sm-5 no-padding"> 
                                                                                            <label><?= lang('from') ?></label>
                                                                                            <input type="text" id="collectdate1" ng-model="neworder.collect_date1" name="daterange" class="form-control o-datepicker" ng-disabled="collect_shortcuts"  ng-change="setCTime()" placeholder="<?= lang('collect_date') ?>"  required>

                                                                                            <span class="help-block m-b-none text-danger" ng-show="errors.collect_date1">{{errors.collect_date1}}</span>
                                                                                       </div>
                                                                                       <div class="col-sm-1 hidden-xs dseparator">_</div>
                                                                                       <div class="col-xs-12 col-sm-5 no-padding"> 
                                                                                            <label><?= lang('to') ?></label>
                                                                                            <input type="text" id="collectdate2" ng-model="neworder.collect_date2" name="daterange" class="form-control o-datepicker" ng-disabled="collect_shortcuts" ng-change="setCTime()" placeholder="<?= lang('collect_date') ?>"  required>
                                                                                            <span class="help-block m-b-none text-danger" ng-show="errors.collect_date2">{{errors.collect_date2}}</span>
                                                                                       </div>
                                                                                       <div class="clearfix"></div>
                                                                                       <p class="date_info"><?= lang('based_on') ?>
                                                                                            <span class="timezone"> {{neworder.collect_timezone.zoneinfo + '(' + neworder.collect_timezone.offset + ')'}}</span>
                                                                                            (<a class="change_timezone" ng-click="show_collection_timezone()" ><?= lang('change_timezone') ?></a>)
                                                                                            <span class="m-b-none text-danger" ng-show="errors.collect_timezone">{{errors.collect_timezone}}</span>
                                                                                       </p>
                                                                                       <p class="date_info">The selected collection period is from <span class="timezone">{{neworder.cdate_convert|| 'XXX to YYY'}}</span> for the selected country</p>
                                                                                  </div>
                                                                             </div>                        
                                                                        </div>
                                                                   </div>
                                                              </div>
                                                              <div class="col-sm-6 no-padding">
                                                                   <div class="a-box a-box-right">
                                                                        <h2><?= lang('deliver_to') ?><img src="<?php echo base_url(); ?>resource/images/address.jpg" class="mycontact" ng-click="show_contact_popup('delivery')"><!-- <span class="mycontact" ><?= lang('select_from_mycontacts') ?></span> --></h2>
                                                                        <div class="col-sm-12 address_box">
                                                                             <div class="col-sm-12 no-padding" style="visibility: hidden;">
                                                                                  <div class="lock_info">
                                                                                       <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img">
                                                                                       <span>Fields or section with this icon will be displayed only to assigned or awarded courier</span>
                                                                                  </div>
                                                                             </div>
                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.delivery_address_l1" class="form-control required" ng-class="{error:errors.delivery_address_l1}" placeholder="<?= lang('deliver_add_l1') ?>" required>
                                                                                       <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img">
                                                                                       <!-- <span class="help-block m-b-none m-t-none m-l-xs"><?= lang('order_add_l1_info') ?></span> -->
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_address_l1">{{errors.delivery_address_l1}}</span>
                                                                                  </div>
                                                                             </div>

                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.delivery_address_l2" class="form-control" ng-class="{error:errors.delivery_address_l2}" placeholder="<?= lang('deliver_add_l2') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_address_l2">{{errors.delivery_address_l2}}</span>
                                                                                  </div>
                                                                             </div>

                                                                             <div class="col-sm-6 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.delivery_zipcode" class="form-control" ng-class="{error:errors.delivery_zipcode}" placeholder="<?= lang('deliver_zipcode') ?>">
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_zipcode">{{errors.delivery_zipcode}}</span>
                                                                                  </div>
                                                                             </div> 

                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <select  ng-model="neworder.delivery_country" class="form-control " ng-class="{error:errors.delivery_country}" placeholder="<?= lang('collect_country') ?>" ng-options="country.code as country.country for country in countrylist" ng-change="getDTimezones(true)" required>
                                                                                            <option value="">--select country--</option>
                                                                                       </select> 
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_country">{{errors.delivery_country}}</span>
                                                                                  </div>
                                                                                  <div class="clearfix chk"> 
                                                                                       <span style="float: left;margin:5px;"> 
                                                                                            <input ng-model="neworder.is_d_restricted_area" type="checkbox" icheck>
                                                                                       </span> 
                                                                                       <p><?= lang('deliver_restrict') ?></p>
                                                                                  </div>
                                                                             </div> 
                                                                             <p class="sub_h"><?= lang('contact_person') ?>

                                                                                  <img src="<?php echo base_url(); ?>resource/images/lock.png" class="lock_img"></p>
                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.delivery_contactname" class="form-control " ng-class="{error:errors.delivery_contactname}" placeholder="<?= lang('contact_name') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_contactname">{{errors.delivery_contactname}}</span>
                                                                                  </div>


                                                                             </div>
                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="text" ng-model="neworder.delivery_phone" class="form-control " ng-class="{error:errors.delivery_phone}" placeholder="<?= lang('phone_number') ?>" required>
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_phone">{{errors.delivery_phone}}</span>
                                                                                  </div>

                                                                             </div> 
                                                                             <div class="col-sm-8 no-padding">
                                                                                  <div class="form-group">
                                                                                       <input type="email" ng-model="neworder.delivery_email" name="delivery_email" class="form-control" ng-class="{error:errors.delivery_email || new_order.delivery_email.$invalid}" placeholder="<?= lang('order_email') ?>">
                                                                                       <span class="help-block m-b-none text-danger" ng-show="errors.delivery_email">{{errors.delivery_email}}</span>
                                                                                  </div>
                                                                             </div> 

                                                                             <p class="sub_h"><?= lang('delivery_period') ?></p>
                                                                             <p class="small-f"><?= lang('delivery_time_info') ?></p>
                                                                             <div class="col-sm-12 no-padding">
                                                                                  <div class="angular_popup deliver_timezone pull-right" draggable="true" ng-show="view_delivery_timezone_list">  
                                                                                       <h3><?= lang('timezone') ?><i class="fa fa-close pull-right" ng-click="cancel_delivery_timezone()"></i></h3>
                                                                                       <div class="form-holder">

                                                                                            <div class="form-group">

                                                                                                 <div class="col-sm-12">
                                                                                                      <select  class="form-control" ng-model="neworder.delivery_timezone" ng-change="cancel_delivery_timezone()" ng-options="zone as zone.zoneinfo+'('+zone.offset+')' for zone in timezones track by zone.zoneinfo">
                                                                                                      </select>
                                                                                                 </div>
                                                                                            </div>
                                                                                       </div>
                                                                                  </div>


                                                                                  <div class="form-group">
                                                                                       <div class="col-xs-12 no-padding">
                                                                                            <select ng-model="delivery_shortcuts" class="form-control" ng-change="setDRange()"  ng-options="sc as sc.name for sc in dsclist">
                                                                                                 <option value=""><?= lang('custom-delivery-period') ?></option>
                                                                                            </select>
                                                                                       </div>
                                                                                       <div class="col-xs-12 col-sm-5 no-padding"> 
                                                                                            <label><?= lang('from') ?></label>
                                                                                            <input type="text" id="deliverydate1" ng-model="neworder.deliver_date1" name="daterange" ng-disabled="delivery_shortcuts" class="form-control o-datepicker" ng-change="setDTime()"  placeholder="<?= lang('deliver_date') ?>"  required>
                                                                                            <span class="help-block m-b-none text-danger" ng-show="errors.deliver_date1">{{errors.deliver_date1}}</span>
                                                                                       </div>
                                                                                       <div class="col-sm-1 hidden-xs dseparator">_</div>
                                                                                       <div class="col-xs-12 col-sm-5 no-padding"> 
                                                                                            <label><?= lang('to') ?></label>
                                                                                            <input type="text" id="deliverydate2" ng-model="neworder.deliver_date2" name="daterange" class="form-control o-datepicker" ng-disabled="delivery_shortcuts" ng-change="setDTime()"  placeholder="<?= lang('deliver_date') ?>"  required>
                                                                                            <span class="help-block m-b-none text-danger" ng-show="errors.deliver_date2">{{errors.deliver_date2}}</span>

                                                                                       </div>  
                                                                                       <div class="clearfix"></div>
                                                                                       <p class="date_info"><?= lang('based_on') ?> <span class="timezone">{{neworder.delivery_timezone.zoneinfo + '(' + neworder.delivery_timezone.offset + ')'}}</span> 
                                                                                            (<a class="change_timezone" ng-click="show_delivery_timezone()" >Change timezone</a>)
                                                                                            <span class="m-b-none text-danger" ng-show="errors.delivery_timezone">{{errors.delivery_timezone}}</span>
                                                                                       </p>
                                                                                       <p class="date_info">The selected delivery period is from <span class="timezone">{{neworder.ddate_convert|| 'XXX to YYY'}}</span> for the selected country</p>
                                                                                  </div>
                                                                             </div> 
                                                                        </div>
                                                                   </div>
                                                              </div>
                                                              <div class="col-xs-12 well">
                                                                   <p class="a_srv_h">Tender</p>
                                                                   <div class="col-sm-12 no-padding"> 
                                                                        <div class="col-sm-6 col-md-4">
                                                                             <div class="form-group ser_ass_text bdtpicker">
                                                                                  <p style="margin: 0;font-size: 16px;"><?= lang('deadline_title') ?></p>
                                                                                  <input type="text" ng-model="neworder.deadline" class="form-control " ng-class="{error:errors.deadline}" placeholder="<?= lang('deadline') ?>" style="height:50px" id="bidding_deadline">
                                                                             </div>
                                                                             <span class="help-block m-b-none text-danger" ng-show="errors.deadline">{{errors.deadline}}</span>
                                                                        </div>
                                                                        <div class="col-sm-6 col-md-8" ng-show="neworder.org_id">
                                                                             <div class="open_bid_wrap open"  ng-if="scop.open_bid"  style="display: inline-flex">
                                                                                  <span style="margin:auto 15px auto 0;"> 
                                                                                       <input type="checkbox" ng-model="neworder.open_bid" ng-class="{error:errors.open_bid}" icheck> 
                                                                                  </span>
                                                                                  <div>
                                                                                       <h4><?= lang('open_bid') ?></h4>
                                                                                       <p> <?= lang('open_tender_info') ?></p>
                                                                                  </div>
                                                                             </div>
                                                                             <div class="open_bid_wrap closed"  ng-if="!scop.open_bid">
                                                                                  <div ng-show="scop.c_count > 0">
                                                                                       <h4 class="tender-title"><?= lang('closed_tender') ?></h4>
                                                                                       <p> <?= lang('closed_tender_info') ?></p>
                                                                                  </div>
                                                                                  <div ng-show="scop.c_count == 0">
                                                                                       <p style="margin-top: 15px;"> <?= lang('no-approved-couriers') ?></p>
                                                                                  </div>
                                                                             </div>
                                                                        </div>
                                                                        <script>
                                                                             $(function () {
                                                                                  $('#bidding_deadline').datetimepicker({
                                                                                       format: 'MM/DD/YYYY h:mm A',
                                                                                       minDate: moment(),
                                                                                       defaultDate: moment().add('day', 1)
                                                                                  });
                                                                                  setTimeout(function () {
                                                                                       var result = moment().add('day', 1).format('MM/DD/YYYY h:mm A');
                                                                                       $("#bidding_deadline").val(result);
                                                                                       $("#bidding_deadline").trigger('input');
                                                                                  }, 1000);
                                                                                  $('#bidding_deadline').on('dp.change', function () {
                                                                                       $("#bidding_deadline").trigger('input');
                                                                                  }); //                                                  
                                                                             });</script>
                                                                   </div>                                  
                                                              </div>
                                                         </div>         
                                                    </fieldset>
                                                    <div class="col-sm-12 no-padding margin_top_10">
                                                         <h3 class="order_title">
                                                              <span class="pull-right">
                                                                   <span class="pull-right">
                                                                        <a ui-sref="delivery_orders.view_order({order_id:neworder.public_id})" class="btn-cancel"> <?= lang('cancel_btn') ?></a>

                                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                                             <?= lang('submit_btn') ?>                                                  
                                                                        </button>         
                                                                   </span>       
                                                              </span>
                                                         </h3>
                                                    </div>
                                               </form>
                                          </div>
                                          <script>
                                               $(function () {
                                                    $('.o-datepicker').daterangepicker({
                                                         timePicker: true,
                                                         singleDatePicker: true,
                                                         format: 'MM/DD/YYYY h:mm A',
                                                         minDate: new Date(),
                                                         timePickerIncrement: 30,
                                                         timePicker12Hour: true,
                                                         timePickerSeconds: false
                                                    });
                                               });
                                          </script>                            
                                     </div>
                                     <div class="clear"></div>
                                </div>


                           </div>

                           <?php $this->load->view('contactpopup') ?>
                      <?php } else {
                           ?>
                           <a ui-sref="tender_requests.delivery" class="btn btn-primary btn-sm close_btn"><i class="glyphicon glyphicon-remove"></i></a>

                           <p class="well text-danger"><?= lang('nothing_to_display') ?></p>
                           <?php
                      }
                    ?>
               </div>

          </div>
     </div>
</div>

