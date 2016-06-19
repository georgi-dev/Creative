<?php
session_start();
//print_r($_SESSION);
?>
<section id="content">
    <div class="page">
        <section class="panel panel-default table-dynamic">
            <div id="skrit" style="display:none;position:absolute;width:250px;height:250px;border:1px solid red;"></div>
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span> Creative
                </strong>
                <div id="hello" class="text-center"><em>Здравей , <span style="color:orange;font-weight:bold;"><?php echo $_SESSION['username']?></span></em></div>
                <button>Log out</button>
            </div>
            <div class="panel-body form-horizontal" id="frmFilter">
               <div class="col-md-6">                 

                    <div class="form-group">
                        <label for="field_id" class="col-md-4 control-label">Id</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_id" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_name" class="col-md-4 control-label">Products name</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_author" class="col-md-4 control-label">Products author</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_author" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_link_author" class="col-md-4 control-label">Products link author</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_link_author" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_cat" class="col-md-4 control-label">Products cat</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_cat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_link_cat" class="col-md-4 control-label">Products link cat</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_link_cat" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field_products_sub_cat" class="col-md-4 control-label">Products sub cat</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_sub_cat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_link_sub_cat" class="col-md-4 control-label">Products link sub cat</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_link_sub_cat" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_products_desc" class="col-md-4 control-label">Products desc</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_products_desc" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_images" class="col-md-4 control-label">Images</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_images" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field_created" class="col-md-4 control-label">Created</label>
                        <div class="col-md-5 col-sm-4"><input type="text" class="form-control" id="field_created" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 col-sm-4 control-label"></label>
                    <div class="col-md-3 col-sm-4">
                        <button class="btn btn-primary" onclick="Creatives.get({page:1});">Apply filter</button>
                    </div>
                </div>
            </div>

            <table id="tblCreative" class="table">
                <thead>
                    <tr>
                    
<th><div class="th">Id</div></th>
<th><div class="th">Products name</div></th>
<th><div class="th">Products author</div></th>
<!-- <th><div class="th">Products link author</div></th> -->
<th><div class="th">Products cat</div></th>
<!-- <th><div class="th">Products link cat</div></th> -->
<th><div class="th">Products sub cat</div></th>
<!-- <th><div class="th">Products link sub cat</div></th> -->
<th><div class="th">Products desc</div></th>
<th><div class="th">Images</div></th>
<th><div class="th">Created</div></th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <input type="hidden" id="hddnPage" value="1" />

            <nav class="row">
                <div class="col-md-14">
                    <ul class="pagination pull-right"></ul>
                </div>
            </nav>
        </section>
    </div>
</section>
<script>
    $(document).ready(function()
    {   $('#hello').animate({marginTop:'0'},3000);
        Creatives.get({page: 1});
    });
</script>
