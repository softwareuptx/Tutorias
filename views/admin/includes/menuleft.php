<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong><?=User()->nombre?></strong>
                        </div>
                        <div class="col-lg-12">
                            <?=User()->apellidopat.' '.User()->apellidomat?>
                        </div>
                    </div>
                    <p></p>
                    <span class="label label-success"><?=periodo()->periodo?></span>
                    <hr style="margin-bottom: 0px !important">
                </li>
                <li>
                    <a href="<?=base_url('tutores')?>" class="waves-effect <?=menu('tutores')?>"><i class="fa fa-calendar-check-o"></i> <span>Tutores</span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->