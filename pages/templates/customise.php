<?php
  $active_menu = "Templates";
  include_once "../layout/header.php";
?>
<Style>
.modal-xl {
    width: 1140px;
}
</Style>

<body class="hold-transition skin-blue sidebar-mini fixed" style="height: auto; min-height: 100%;">
    <!-- Put Page-level css and javascript libraries here -->

    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jQueryUI/jquery-ui.min.js"></script>

    <!-- Morris chart -->
    <link rel="stylesheet" href="../../plugins/morris/morris.css">

    <!-- Morris.js charts -->
    <script src="../../plugins/raphael/raphael-min.js"></script>
    <script src="../../plugins/morris/morris.min.js"></script>

    <!-- Sparkline -->
    <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- jvectormap -->
    <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- jQuery Knob -->
    <script src="../../plugins/knob/jquery.knob.js"></script>

    <!-- daterangepicker -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
  <script src="../../dist/js/pages/dashboard.js"></script>-->

    <!-- ================================================ -->

    <div class="wrapper">

        <?php include_once "../layout/topmenu.php"; ?>
        <?php include_once "../layout/left-sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <?php
$tid=$_POST["tid"];
?>
            <section class="content" ng-app="myApp" ng-controller="templateCtrl" id="templateCtrl">
                <div class="row">
                <div cg-busy="myPromise"></div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 style="font-size:28px">Template: {{tname}}</h3>

                                <p>Event Name: {{eventname}}</p>
                            </div>
                            
                            <div class="icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <a href="/pages/templates/" class="small-box-footer">
                                Go Back to Templates <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>

                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div align="center">
                                    <button class="btn btn-app bg-green" data-toggle="modal"
                                        data-target="#modal-create-image" ng-click="template_image_add()">
                                        <i class="fa fa-plus"></i>Add Image
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div align="center">
                                    <button class="btn btn-app bg-green" data-toggle="modal"
                                        data-target="#modal-create-text">
                                        <i class="fa fa-plus" ng-click="template_text_add()"></i>Add Text
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div align="center">
                                    <button class="btn btn-app bg-green" data-toggle="modal"
                                        data-target="#modal-create-qrc" ng-click="template_qrc_add()">
                                        <i class="fa fa-plus"></i>Add Verify QR Code
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div align="center">
                                    <form action="https://certportal.eduskillsfoundation.org/Certificate/pdfcrtallllllllllllll.jsp"
                                        method="post" target="tpreview">
                                        <input type="hidden" ng-value="tjson" id="tjson" name="tjson">
                                        <input type="submit" class="btn btn-app bg-green" data-toggle="modal"
                                            data-target="#modal-preview" value="Save/Preview Template"
                                            ng-click="save()">

                                        </input>
                                    </form>
                                    <div class="modal fade" id="modal-preview" style="display: none;"
                                        class="box box-primary">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header box-header with-border">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Preview Template</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe id="tpreview" name="tpreview" src="" width="800px"
                                                        height="500px"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left"
                                                        data-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                            <!-- /.modal-content -->

                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Template Images</h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="template-images" class="table table-bordered table-striped dataTable"
                                datatable="ng" dt-options="dtOptions">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Image Path</th>
                                        <th>Posx</th>
                                        <th>Posy</th>
                                        <th>Page Align</th>
                                        <th>Image Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="image in tdetails.images" repeat-done="initDataTable">
                                        <td>{{$index+1}}</td>
                                        <td>{{image.imagepath}}</td>
                                        <td>{{image.posx}}</td>
                                        <td>{{image.posy}}</td>
                                        <td>{{image.pagealign}}</td>
                                        <td>{{image.imageType}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-default" ng-click="template_image_edit($index)"
                                                    data-toggle="modal" data-target="#modal-edit-image">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-default" ng-click="template_image_delete($index)"
                                                    data-toggle="modal" data-target="#modal-delete-image">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="modal fade" id="modal-edit-image" style="display: none;" class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_edit_image" name="form_edit_image" class="appnitro" role="form"
                                    method="post" ng-submit="editImage()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="File Name">Image Path:{{editimagepath}}</label>

                                            </div>
                                            <div class="form-group">
                                                <label for="editposx">Position x axis (0-800)</label>
                                                <input type="text" class="form-control" id="editposx"
                                                    placeholder="Enter posx" name="editposx" ng-model="editposx" min="0"
                                                    max="800" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_image.editposx.$dirty && form_edit_image.editposx.$invalid">
                                                    <span ng-show="form_edit_image.editposx.$error.required">Position x
                                                        must be an integer
                                                        between 0 to 800.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="editposy">Position y axis (0-590)</label>
                                                <input type="text" class="form-control" id="editposy"
                                                    placeholder="Enter posy" name="editposy" ng-model="editposy" min="0"
                                                    max="590" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_image.editposy.$dirty && form_edit_image.editposy.$invalid">
                                                    <span ng-show="form_edit_image.editposy.$error.required">Position y
                                                        axis is
                                                        Required</span>
                                                    <span ng-show="form_edit_image.editposy.$error.integer">Position y
                                                        must be an integer
                                                        between 0 to 590.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="Page Align">Page Align</label>
                                                <Select type="text" class="form-control" id="editpagealign"
                                                    placeholder="Page Align" name="editpagealign"
                                                    ng-model="editpagealign" required>
                                                    <option value="">==Select Page Align==</option>
                                                    <option value="Landscape" Selected>Landscape</option>
                                                    <option value="Potrait">Potrait</option>
                                                </Select>
                                                <span style="color:red"
                                                    ng-show="form_edit_image.editpagealign.$dirty && form_edit_image.editpagealign.$invalid">
                                                    <span ng-show="form_edit_image.editpagealign.$error.required">Select
                                                        Page Align to continue.</span>

                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="Page Align">Image Type</label>
                                                <Select type="text" class="form-control" id="editimagetype"
                                                    placeholder="Page Align" name="editimagetype"
                                                    ng-model="editimagetype" required>
                                                    <option value="">==Select Image Type==</option>
                                                    <option value="background" Selected>background</option>
                                                    <option value="normal">normal</option>
                                                </Select>
                                                <span style="color:red"
                                                    ng-show="form_edit_image.editimagetype.$dirty && form_edit_image.editimagetype.$invalid">
                                                    <span ng-show="form_edit_image.editimagetype.$error.required">Select
                                                        Page Align to continue.</span>

                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                                id="closeeditmodal">Close</button>
                                            <input type="submit" ng-disabled="form_edit_image.template_name.$dirty && form_edit_image.template_name.$invalid ||  
                                                form_edit_image.posy.$dirty && form_edit_image.posy.$invalid"
                                                class="btn btn-primary" value="Save Changes"></input>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="modal modal-danger fade" id="modal-delete-image" style="display: none;"
                            class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_delete_image" name="form_delete_image" class="appnitro" role="form"
                                    method="post" ng-submit="deleteImage()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Partner Name">Please Confirm Deletion of image<br /><span
                                                        class="box-warning">Image: {{deleteimagepath}}</span></label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                                id="closedeletemodal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Save Changes"></input>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                        <div class="box-header">
                            <h3 class="box-title">Template Texts</h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="template-images" class="table table-bordered table-striped dataTable"
                                datatable="ng" dt-options="dtOptions">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Text Field</th>
                                        <th>Posx</th>
                                        <th>Posy</th>
                                        <th>Font Size</th>
                                        <th>Text Color</th>
                                        <th>Text Before</th>
                                        <th>Text After</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="text in tdetails.texts" repeat-done="initDataTable">
                                        <td>{{$index+1}}</td>
                                        <td>{{text.txtfield}}</td>
                                        <td>{{text.posx}}</td>
                                        <td>{{text.posy}}</td>
                                        <td>{{text.fontSize}}</td>
                                        <td>
                                            <div
                                                style="width: 10px;height: 10px;display: inline-block;position: relative;left: 5px;top: 5px;background-color:{{text.bc}};">
                                            </div>
                                        </td>
                                        <td>{{text.txtbefore}}</td>
                                        <td>{{text.txtafter}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-default" ng-click="template_text_edit($index)"
                                                    data-toggle="modal" data-target="#modal-edit-txt">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-default" ng-click="template_text_delete($index)"
                                                    data-toggle="modal" data-target="#modal-delete-txt">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </div>

                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="modal fade" id="modal-edit-txt" style="display: none;" class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_edit_text" name="form_edit_text" class="appnitro" role="form"
                                    method="post" ng-submit="editText()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit text</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Text Field">Choose Text Field</label>
                                                <Select type="text" class="form-control" id="edittxtfield"
                                                    placeholder="Choose Text Field" name="edittxtfield"
                                                    ng-model="edittxtfield" required>
                                                    <option value="">==Select Text Field==</option>
                                                    <option ng-repeat="txtf in txtfs" value="{{txtf.column}}">
                                                        {{txtf.displayname}}</option>
                                                </Select>
                                                <span style="color:red"
                                                    ng-show="form_edit_text.edittxtfield.$dirty && form_edit_text.edittxtfield.$invalid">
                                                    <span ng-show="form_edit_text.edittxtfield.$error.required">Select
                                                        Text Field
                                                        to Add.</span>

                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="posx">Position x axis (0-800)</label>
                                                <input type="text" class="form-control" id="edittxtposx"
                                                    placeholder="Enter posx" name="edittxtposx" ng-model="edittxtposx"
                                                    min="0" max="800" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_text.edittxtposx.$dirty && form_edit_text.edittxtposx.$invalid">
                                                    <span ng-show="form_edit_text.edittxtposx.$error.required">Position
                                                        x must be
                                                        an integer
                                                        between 0 to 800.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="edittxtposy">Position y axis (0-590)</label>
                                                <input type="text" class="form-control" id="edittxtposy"
                                                    placeholder="Enter posy" name="edittxtposy" ng-model="edittxtposy"
                                                    min="0" max="590" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_text.edittxtposy.$dirty && form_edit_text.edittxtposy.$invalid">
                                                    <span ng-show="form_edit_text.edittxtposy.$error.required">Position
                                                        y axis is
                                                        Required</span>
                                                    <span ng-show="form_edit_text.edittxtposy.$error.integer">Position y
                                                        must be
                                                        an integer
                                                        between 0 to 590.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="Font Size">Font Size</label>
                                                <input type="text" class="form-control" id="edittxtfontsize"
                                                    placeholder="Font Size" name="edittxtfontsize"
                                                    ng-model="edittxtfontsize" required></input>
                                                <span style="color:red"
                                                    ng-show="form_edit_text.edittxtfontsize.$dirty && form_edit_text.edittxtfontsize.$invalid">
                                                    <span ng-show="form_edit_text.edittxtfontsize.$error.required">Add
                                                        Font Size
                                                        to continue.</span>

                                                    <span ng-show="form_edit_text.edittxtfontsize.$error.integer">Font
                                                        Size should
                                                        be integer.</span>
                                                </span>
                                                <div class="form-group">
                                                    <label for="Font Size">Font Color</label>
                                                    <input type="color" class="form-control" id="edittxtcolor"
                                                        placeholder="Font Size" name="edittxtcolor"
                                                        ng-model="edittxtcolor" value="#000000"></input>

                                                </div>
                                                <div class="form-group">
                                                    <label for="Text Before">Text Before (Text to be displayed before
                                                        Text
                                                        Field)</label>
                                                    <input type="text" class="form-control" id="edittxtbefore"
                                                        placeholder="Text Before" name="edittxtbefore"
                                                        ng-model="edittxtbefore"></input>

                                                </div>
                                                <div class="form-group">
                                                    <label for="Text Before">Text After (Text to be displayed after Text
                                                        Field)</label>
                                                    <input type="text" class="form-control" id="edittxtafter"
                                                        placeholder="Text After" name="edittxtafter"
                                                        ng-model="edittxtafter"></input>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal" id="closeedittxtmodal">Close</button>
                                                <input type="submit" ng-disabled="form_edit_text.edittxtposx.$dirty && form_edit_text.edittxtposx.$invalid ||  
                                                    form_edit_text.edittxtposy.$dirty && form_edit_text.edittxtposy.$invalid" class="btn btn-primary"
                                                    value="Save Changes"></input>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div></div>
                        <div class="modal modal-danger fade" id="modal-delete-txt" style="display: none;"
                            class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_delete_txt" name="form_delete_txt" class="appnitro" role="form"
                                    method="post" ng-submit="deleteText()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete Text</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Partner Name">Please Confirm Deletion of text<br /><span
                                                        class="box-warning">Text Field: {{deletetxtfield}}</span></label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                                id="closedeletetxtmodal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Save Changes"></input>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="box-header">
                            <h3 class="box-title">QR Codes</h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="template-images" class="table table-bordered table-striped dataTable"
                                datatable="ng" dt-options="dtOptions">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>QR Code Link Text</th>
                                        <th>Posx</th>
                                        <th>Posy</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="qrc in tdetails.qrcodes" repeat-done="initDataTable">
                                        <td>{{$index+1}}</td>
                                        <td>{{qrc.txt}}</td>
                                        <td>{{qrc.posx}}</td>
                                        <td>{{qrc.posy}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-default" ng-click="template_qrc_edit($index)"
                                                    data-toggle="modal" data-target="#modal-edit-qrc">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-default" ng-click="template_qrc_delete($index)"
                                                    data-toggle="modal" data-target="#modal-delete-qrc">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="modal fade" id="modal-edit-qrc" style="display: none;" class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_edit_qrc" name="form_edit_qrc" class="appnitro" role="form"
                                    method="post" ng-submit="editQrc()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit QR Code</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Text Field">QR Code Link</label>
                                                <input type="text" class="form-control" id="editqrclink"
                                                    placeholder="Choose Text Field" name="editqrclink"
                                                    ng-model="editqrclink" required>
                                                </input>
                                                <span style="color:red"
                                                    ng-show="form_edit_qrc.editqrclink.$dirty && form_edit_qrc.editqrclink.$invalid">
                                                    <span ng-show="form_edit_qrc.editqrclink.$error.required">Select
                                                        Text Field
                                                        to Add.</span>

                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="posx">Position x axis (0-800)</label>
                                                <input type="text" class="form-control" id="editqrcposx"
                                                    placeholder="Enter posx" name="editqrcposx" ng-model="editqrcposx"
                                                    min="0" max="800" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_qrc.editqrcposx.$dirty && form_edit_qrc.editqrcposx.$invalid">
                                                    <span ng-show="form_edit_qrc.editqrcposx.$error.required">Position
                                                        x must be
                                                        an integer
                                                        between 0 to 800.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="editqrcposy">Position y axis (0-590)</label>
                                                <input type="text" class="form-control" id="editqrcposy"
                                                    placeholder="Enter posy" name="editqrcposy" ng-model="editqrcposy"
                                                    min="0" max="590" integer required>
                                                <span style="color:red"
                                                    ng-show="form_edit_qrc.editqrcposy.$dirty && form_edit_qrc.editqrcposy.$invalid">
                                                    <span ng-show="form_edit_qrc.editqrcposy.$error.required">Position
                                                        y axis is
                                                        Required</span>
                                                    <span ng-show="form_edit_qrc.editqrcposy.$error.integer">Position y
                                                        must be
                                                        an integer
                                                        between 0 to 590.</span>
                                                </span>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal" id="closeeditqrcmodal">Close</button>
                                                <input type="submit" ng-disabled="form_edit_text.editqrcposx.$dirty && form_edit_text.editqrcposx.$invalid ||  
                                                    form_edit_text.editqrcposy.$dirty && form_edit_text.editqrcposy.$invalid" class="btn btn-primary"
                                                    value="Save Changes"></input>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div></div>
                        <div class="modal modal-danger fade" id="modal-delete-qrc" style="display: none;"
                            class="box box-primary">
                            <div class="modal-dialog">
                                <form id="form_delete_qrc" name="form_delete_qrc" class="appnitro" role="form"
                                    method="post" ng-submit="deleteQrc()">
                                    <div class="modal-content">
                                        <div class="modal-header box-header with-border">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete QR Code</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="Partner Name">Please Confirm Deletion of QR Code<br /><span
                                                        class="box-warning">QR Code Link: {{deleteqrclink}}</span></label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                                id="closedeleteqrcmodal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Save Changes"></input>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </form>
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-create-image" style="display: none;" class="box box-primary">
                    <div class="modal-dialog">
                        <form id="form_add" name="form_add" class="appnitro" role="form" method="post"
                            ng-submit="addImage()">
                            <div class="modal-content">
                                <div class="modal-header box-header with-border">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Add New Image</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="template Name">Upload Image</label>
                                        <input type="file" class="form-control" id="image_file" name="image_file"
                                            accept=".jpg, .jpeg, .png" ng-model="image_file" required>
                                        <input type='button' value='Upload' id='upload' ng-click='img_upload()'>
                                        <input type="hidden" ng-value="file_upload_success" id="file_upload_success"
                                            name="file_upload_success">
                                        <label name="filename">{{filename}}</label>
                                        <span style="color:red"
                                            ng-show="form_add.file_upload_success.$dirty && form_add.file_upload_success.$invalid">
                                            <span ng-show="form_add.file_upload_success.$error.required">Upload Image to
                                                Continue</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="posy">Position x axis (0-800)</label>
                                        <input type="text" class="form-control" id="posx" placeholder="Enter posx"
                                            name="posx" ng-model="posx" min="0" max="800" integer required>
                                        <span style="color:red"
                                            ng-show="form_add.posy.$dirty && form_add.posy.$invalid">
                                            <span ng-show="form_add.posy.$error.required">Position x must be an integer
                                                between 0 to 800.</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="posy">Position y axis (0-590)</label>
                                        <input type="text" class="form-control" id="posy" placeholder="Enter posy"
                                            name="posy" ng-model="posy" min="0" max="590" integer required>
                                        <span style="color:red"
                                            ng-show="form_add.posy.$dirty && form_add.posy.$invalid">
                                            <span ng-show="form_add.posy.$error.required">Position y axis is
                                                Required</span>
                                            <span ng-show="form_add.posy.$error.integer">Position y must be an integer
                                                between 0 to 590.</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Page Align">Page Align</label>
                                        <Select type="text" class="form-control" id="pagealign" placeholder="Page Align"
                                            name="pagealign" ng-model="pagealign" required>
                                            <option value="">==Select Page Align==</option>
                                            <option value="Landscape" Selected>Landscape</option>
                                            <option value="Potrait">Potrait</option>
                                        </Select>
                                        <span style="color:red"
                                            ng-show="form_add.pagealign.$dirty && form_add.pagealign.$invalid">
                                            <span ng-show="form_add.pagealign.$error.required">Select Page Align to
                                                continue.</span>

                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Page Align">Image Type</label>
                                        <Select type="text" class="form-control" id="imagetype" placeholder="Page Align"
                                            name="imagetype" ng-model="imagetype" required>
                                            <option value="">==Select Image Type==</option>
                                            <option value="background" Selected>background</option>
                                            <option value="normal">normal</option>
                                        </Select>
                                        <span style="color:red"
                                            ng-show="form_add.imagetype.$dirty && form_add.imagetype.$invalid">
                                            <span ng-show="form_add.imagetype.$error.required">Select Page Align
                                                to continue.</span>

                                        </span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                        id="closeaddmodal">Close</button>
                                    <input type="submit" ng-disabled="form_add.posx.$dirty && form_add.posx.$invalid ||  
                  form_add.posy.$dirty && form_add.posy.$invalid" class="btn btn-primary" value="Save Changes"></input>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <div class="modal fade" id="modal-create-text" style="display: none;" class="box box-primary">
                    <div class="modal-dialog">
                        <form id="form_add_text" name="form_add_text" class="appnitro" role="form" method="post"
                            ng-submit="addText()">
                            <div class="modal-content">
                                <div class="modal-header box-header with-border">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Add New text</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Text Field">Choose Text Field</label>
                                        <Select type="text" class="form-control" id="addtxtfield"
                                            placeholder="Choose Text Field" name="addtxtfield" ng-model="addtxtfield"
                                            required>
                                            <option value="">==Select Text Field==</option>
                                            <option ng-repeat="txtf in txtfs" value="{{txtf.column}}">
                                                {{txtf.displayname}}</option>
                                        </Select>
                                        <span style="color:red"
                                            ng-show="form_add_text.addtxtfield.$dirty && form_add_text.addtxtfield.$invalid">
                                            <span ng-show="form_add_text.addtxtfield.$error.required">Select Text Field
                                                to Add.</span>

                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="posx">Position x axis (0-800)</label>
                                        <input type="text" class="form-control" id="addtxtposx" placeholder="Enter posx"
                                            name="addtxtposx" ng-model="addtxtposx" min="0" max="800" integer required>
                                        <span style="color:red"
                                            ng-show="form_add_text.addtxtposx.$dirty && form_add_text.addtxtposx.$invalid">
                                            <span ng-show="form_add_text.addtxtposx.$error.required">Position x must be
                                                an integer
                                                between 0 to 800.</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="addtxtposy">Position y axis (0-590)</label>
                                        <input type="text" class="form-control" id="addtxtposy" placeholder="Enter posy"
                                            name="addtxtposy" ng-model="addtxtposy" min="0" max="590" integer required>
                                        <span style="color:red"
                                            ng-show="form_add_text.addtxtposy.$dirty && form_add_text.addtxtposy.$invalid">
                                            <span ng-show="form_add_text.addtxtposy.$error.required">Position y axis is
                                                Required</span>
                                            <span ng-show="form_add_text.addtxtposy.$error.integer">Position y must be
                                                an integer
                                                between 0 to 590.</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="Font Size">Font Size</label>
                                        <input type="text" class="form-control" id="addtxtfontsize"
                                            placeholder="Font Size" name="addtxtfontsize" ng-model="addtxtfontsize"
                                            required></input>
                                        <span style="color:red"
                                            ng-show="form_add_text.addtxtfontsize.$dirty && form_add_text.addtxtfontsize.$invalid">
                                            <span ng-show="form_add_text.addtxtfontsize.$error.required">Add Font Size
                                                to continue.</span>

                                            <span ng-show="form_add_text.addtxtfontsize.$error.integer">Font Size should
                                                be integer.</span>
                                        </span>
                                        <div class="form-group">
                                            <label for="Font Size">Font Color</label>
                                            <input type="color" class="form-control" id="addtxtcolor"
                                                placeholder="Font Size" name="addtxtcolor" ng-model="addtxtcolor"
                                                value="#000000"></input>

                                        </div>
                                        <div class="form-group">
                                            <label for="Text Before">Text Before (Text to be displayed before Text
                                                Field)</label>
                                            <input type="text" class="form-control" id="addtxtbefore"
                                                placeholder="Text Before" name="addtxtbefore"
                                                ng-model="addtxtbefore"></input>

                                        </div>
                                        <div class="form-group">
                                            <label for="Text Before">Text After (Text to be displayed after Text
                                                Field)</label>
                                            <input type="text" class="form-control" id="addtxtafter"
                                                placeholder="Text After" name="addtxtafter"
                                                ng-model="addtxtafter"></input>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                            id="closeaddtxtmodal">Close</button>
                                        <input type="submit" ng-disabled="form_add_text.template_name.$dirty && form_add_text.template_name.$invalid ||  
                  form_add_text.addtxtposy.$dirty && form_add_text.addtxtposy.$invalid" class="btn btn-primary"
                                            value="Save Changes"></input>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div></div>
                <div class="modal fade" id="modal-create-qrc" style="display: none;" class="box box-primary">
                    <div class="modal-dialog">
                        <form id="form_add_qrc" name="form_add_qrc" class="appnitro" role="form" method="post"
                            ng-submit="addQrc()">
                            <div class="modal-content">
                                <div class="modal-header box-header with-border">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Add New QRCode</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="QRCode Link">QRCode Link</label>
                                        <input type="text" class="form-control" id="addqrclink"
                                            placeholder="QRCode Link" name="addqrclink" ng-model="addqrclink"
                                            required>
                                        </input>
                                        <span style="color:red"
                                            ng-show="form_add_qrc.addtxtfield.$dirty && form_add_qrc.addtxtfield.$invalid">
                                            <span ng-show="form_add_qrc.addtxtfield.$error.required">Add QRCode Link to Continue.</span>

                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="posx">Position x axis (0-800)</label>
                                        <input type="text" class="form-control" id="addqrcposx" placeholder="Enter posx"
                                            name="addqrcposx" ng-model="addqrcposx" min="0" max="800" integer required>
                                        <span style="color:red"
                                            ng-show="form_add_qrc.addqrcposx.$dirty && form_add_qrc.addqrcposx.$invalid">
                                            <span ng-show="form_add_qrc.addqrcposx.$error.required">Position x must be
                                                an integer
                                                between 0 to 800.</span>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="addqrcposy">Position y axis (0-590)</label>
                                        <input type="text" class="form-control" id="addqrcposy" placeholder="Enter posy"
                                            name="addqrcposy" ng-model="addqrcposy" min="0" max="590" integer required>
                                        <span style="color:red"
                                            ng-show="form_add_qrc.addqrcposy.$dirty && form_add_qrc.addqrcposy.$invalid">
                                            <span ng-show="form_add_qrc.addqrcposy.$error.required">Position y axis is
                                                Required</span>
                                            <span ng-show="form_add_qrc.addqrcposy.$error.integer">Position y must be
                                                an integer
                                                between 0 to 590.</span>
                                        </span>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal"
                                            id="closeaddqrcmodal">Close</button>
                                        <input type="submit" ng-disabled="form_add_qrc.addqrcposx.$dirty && form_add_qrc.addqrcposx.$invalid ||  
                                        form_add_qrc.addqrcposy.$dirty && form_add_qrc.addqrcposy.$invalid" class="btn btn-primary"
                                            value="Save Changes"></input>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </section>

        </div>
        <script>
        var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
        app.controller('templateCtrl', function($scope, $http, $resource, DTOptionsBuilder, $document, $location) {
            $scope.class = [];
            $scope.tid = '<?php echo $_POST["tid"] ?>';
         $scope.myPromise=$http.get("/pages/templates/gettemplate.php?tid="+$scope.tid)
        .then(function(response) {
                    $scope.template=response.data;
                    $scope.tname = $scope.template.tname;
            $scope.eventid = $scope.template.eventid;
            $scope.tdetails = JSON.parse($scope.template.tdetails);
            $scope.eventname = $scope.template.eventname;
            $scope.tdetails.name = $scope.tname;
            
        });
            
            $http.get("/lib/tfields.json")
                .then(function(response) {
                    $scope.txtfs = response.data;
                    $scope.txtfs = orderBy(txtfs,'column',false);
                });
        
            
            
            $scope.template_image_add = function() {
                angular.forEach(
                    angular.element("input[type='file']"),
                    function(inputElem) {
                        angular.element(inputElem).val(null);
                    });
                $scope.filename = "";
                $scope.posx = "";
                $scope.posy = "";
                $scope.pagealign = "";
                $scope.imagetype = "";
                $scope.form_add.$setPristine();
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_text_add = function() {
                alert("adding text");
                $scope.addtxtfield = "";
                $scope.addtxtposx = "";
                $scope.addtxtposy = "";
                $scope.addtxtfontsize = "";
                $scope.addtxtcolor = "#000000";
                $scope.addtxtafter = "";
                $scope.addtxtbefore = "";
                $scope.form_add_text.$setPristine();
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_qrc_add = function() {
                $scope.addqrclink = "/pages/certificates/verify.php?cert=";
                $scope.addtxtposx = "";
                $scope.addtxtposy = "";
                $scope.form_add_qrc.$setPristine();
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_image_edit = function(index) {
                $scope.editimageindex = index;
                $scope.editimagepath = $scope.tdetails.images[index].imagepath;
                $scope.editposx = $scope.tdetails.images[index].posx;
                $scope.editposy = $scope.tdetails.images[index].posy;
                $scope.editpagealign = $scope.tdetails.images[index].pagealign;
                $scope.editimagetype = $scope.tdetails.images[index].imageType;
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_text_edit = function(index) {
                $scope.edittxtindex = index;
                $scope.edittxtfield = $scope.tdetails.texts[index].txtfield;
                $scope.edittxtposx = $scope.tdetails.texts[index].posx;
                $scope.edittxtposy = $scope.tdetails.texts[index].posy;
                $scope.edittxtfontsize = $scope.tdetails.texts[index].fontSize;
                $scope.edittxtcolor = $scope.tdetails.texts[index].bc;
                $scope.edittxtafter = $scope.tdetails.texts[index].txtafter;
                $scope.edittxtbefore = $scope.tdetails.texts[index].txtbefore;
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_qrc_edit = function(index) {
                $scope.editqrcindex = index;
                $scope.editqrclink = $scope.tdetails.qrcodes[index].txt;
                $scope.editqrcposx = $scope.tdetails.qrcodes[index].posx;
                $scope.editqrcposy = $scope.tdetails.qrcodes[index].posy;
                //outlineeditor.insertHtml($scope.course_outline);
            }

            $scope.template_image_delete = function(index) {
                $scope.deleteimagepath = $scope.tdetails.images[index].imagepath;
                $scope.deleteimageindex = index;
            };

            $scope.template_text_delete = function(index) {
                $scope.deletetxtfield = $scope.tdetails.texts[index].txtfield;
                $scope.deletetxtindex = index;
            };

            $scope.template_qrc_delete = function(index) {
                $scope.deleteqrclink = $scope.tdetails.qrcodes[index].txt;
                $scope.deletetxtindex = index;
            };


            $scope.save = function() {
                $scope.tjson = angular.toJson($scope.tdetails);
                //alert($scope.tjson);
                var fd = new FormData();
                fd.append('template_id', $scope.tid);
                fd.append('template_name', $scope.tname);
                fd.append('event_id', $scope.eventid);
                fd.append('template_details', $scope.tjson);
                fd.append('source', "1");
                // AJAX request
                $http({
                    method: 'post',
                    url: 'update.php',
                    data: fd,
                    headers: {
                        'Content-Type': undefined
                    },
                }).then(function successCallback(response) {
                    // Store response data
                    $scope.fustatus = response.data;
                    // alert($scope.fustatus.msg);
                });
                //$localStorage.status=1;
                //$localStorage.tdetails=$scope.tjson;
                //$scope.tjson = angular.toJson($scope.tdetails);
                //alert(JSON.stringify($scope.tjson));
            }

            $scope.img_upload = function() {
                var fd = new FormData();
                var files = document.getElementById('image_file').files[0];
                fd.append('file', files);
                fd.append('tid', $scope.tid);
                // AJAX request
                $http({
                    method: 'post',
                    url: 'uploadfile.php',
                    data: fd,
                    headers: {
                        'Content-Type': undefined
                    },
                }).then(function successCallback(response) {
                    // Store response data
                    $scope.fustatus = response.data;
                    $scope.file_upload_success = $scope.fustatus.status;
                    $scope.filename = $scope.fustatus.filename;
                    alert($scope.fustatus.msg);
                });
            }

            $scope.addImage = function() {
                newimage = {
                    "imagepath": $scope.filename,
                    "posx": $scope.posx,
                    "posy": $scope.posy,
                    "pagealign": $scope.pagealign,
                    "imageType": $scope.imagetype
                };
                if($scope.tdetails.images)
                {
                    $scope.tdetails.images.push(newimage);
                }
                else
                {
                    $scope.tdetails.images=[];
                    $scope.tdetails.images.push(newimage);
                }
                
                $document[0].getElementById("closeaddmodal").click();
                //alert("testing..");
            }

            $scope.addText = function() {

                newtext = {
                    "txtfield": $scope.addtxtfield,
                    "posx": $scope.addtxtposx,
                    "posy": $scope.addtxtposy,
                    "fontSize": $scope.addtxtfontsize,
                    "bc": $scope.addtxtcolor,
                    "txtafter": $scope.addtxtafter,
                    "txtbefore": $scope.addtxtbefore
                };
                if($scope.tdetails.texts)
                {
                    $scope.tdetails.texts.push(newtext);
                }
                else
                {
                    $scope.tdetails.texts=[];
                    $scope.tdetails.texts.push(newtext);
                }
                
                $document[0].getElementById("closeaddtxtmodal").click();
                //alert("testing..");
            }

            $scope.addQrc = function() {
                newqrc = {
                "txt": $scope.addqrclink,
                "posx": $scope.addqrcposx,
                "posy": $scope.addqrcposy
                };
                if($scope.tdetails.qrcodes)
                {
                    $scope.tdetails.qrcodes.push(newqrc);
                }
                else
                {
                    $scope.tdetails.qrcodes=[];
                    $scope.tdetails.qrcodes.push(newqrc);
                }
                $document[0].getElementById("closeaddqrcmodal").click();
                    //alert("testing..");
            }

            $scope.editImage = function() {
                $scope.tdetails.images[$scope.editimageindex].imagepath = $scope.editimagepath;
                $scope.tdetails.images[$scope.editimageindex].posx = $scope.editposx;
                $scope.tdetails.images[$scope.editimageindex].posy = $scope.editposy;
                $scope.tdetails.images[$scope.editimageindex].pagealign = $scope.editpagealign;
                $scope.tdetails.images[$scope.editimageindex].imageType = $scope.editimagetype;
                $document[0].getElementById("closeeditmodal").click();
                //alert("testing..");
            }

            $scope.editText = function() {
                $scope.tdetails.texts[$scope.edittxtindex].txtfield = $scope.edittxtfield;
                $scope.tdetails.texts[$scope.edittxtindex].posx = $scope.edittxtposx;
                $scope.tdetails.texts[$scope.edittxtindex].posy = $scope.edittxtposy;
                $scope.tdetails.texts[$scope.edittxtindex].fontSize = $scope.edittxtfontsize;
                $scope.tdetails.texts[$scope.edittxtindex].bc = $scope.edittxtcolor;
                $scope.tdetails.texts[$scope.edittxtindex].txtafter = $scope.edittxtafter;
                $scope.tdetails.texts[$scope.edittxtindex].txtbefore = $scope.edittxtbefore;
                $document[0].getElementById("closeedittxtmodal").click();
                //alert("testing..");
            }

            $scope.editQrc = function() {
                $scope.tdetails.qrcodes[$scope.editqrcindex].txt = $scope.editqrclink;
                $scope.tdetails.qrcodes[$scope.editqrcindex].posx = $scope.editqrcposx;
                $scope.tdetails.qrcodes[$scope.editqrcindex].posy = $scope.editqrcposy;
                
                $document[0].getElementById("closeeditqrcmodal").click();
                //alert("testing..");
            }

            $scope.deleteImage = function() {
                var fd = new FormData();
                fd.append('filename', $scope.deleteimagepath);
                // AJAX request
                $http({
                    method: 'post',
                    url: 'deletefile.php',
                    data: fd,
                    headers: {
                        'Content-Type': undefined
                    },
                }).then(function successCallback(response) {
                    // Store response data
                    $scope.fdstatus = response.data;
                    //$scope.file_upload_success=$scope.fustatus.status;
                    //$scope.filename=$scope.fustatus.filename;
                    alert($scope.fdstatus.msg);
                });
                $scope.tdetails.images.splice($scope.deleteimageindex)
                $document[0].getElementById("closedeletemodal").click();
                //alert("testing..");
            }

            $scope.deleteText = function() {
                
                $scope.tdetails.texts.splice($scope.deletetxtindex)
                $document[0].getElementById("closedeletetxtmodal").click();
                //alert("testing..");
            }

            $scope.deleteQrc = function() {
                
                $scope.tdetails.qrcodes.splice($scope.deleteqrcindex)
                $document[0].getElementById("closedeleteqrcmodal").click();
                //alert("testing..");
            }

            $scope.dtOptions = DTOptionsBuilder.newOptions()
                .withButtons([{
                        extend: 'copy',
                        text: '<i class="fa fa-files-o"></i> Copy',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fa fa-file-text-o"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                        titleAttr: 'Print'
                    }
                ]);


        });
        </script>


        <?php include_once "../layout/copyright.php"; ?>
        <?php include_once "../layout/right-sidebar.php"; ?>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <?php include_once "../layout/footer.php" ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
  <script src="../../dist/js/pages/dashboard.js"></script>
   AdminLTE for demo purposes 
  <script src="../../dist/js/demo.js"></script>-->
    <script src="/pages/templates/script.js"></script>