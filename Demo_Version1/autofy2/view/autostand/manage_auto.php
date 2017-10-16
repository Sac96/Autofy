<?php
include_once '../../core/db.php';
include_once './autostand_header.php';
include_once './autostand_menubar.php';

?>


<?php

$k=$_SESSION["autostand_lgid"];

if(!$k){
    header("Location:http://localhost/autofy2/index.php");
}
        
$sql= "SELECT * FROM `auto` WHERE `autostand_id=".$k."`";
$qry = mysqli_query($dbcon, $sql);

?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">   
    <style>
        .clickable
        {
            cursor: pointer;
        }

        .clickable .glyphicon
        {
            background: rgba(0, 0, 0, 0.15);
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px
        }

        .panel-heading span
        {
            margin-top: -23px;
            font-size: 15px;
            margin-right: -9px;
        }
        a.clickable { color: inherit; }
        a.clickable:hover { text-decoration:none; }
    </style>
</head>

<h4>
    Manage autos in your stand
</h4>


<div class="container-fluid">
    
   
    
    <div class="panel panel-info"> 
        <div class="panel-heading clickable">
            <h3 class="panel-title">
                Hello <?php echo $_SESSION["autostand_mail"]; ?></h3>

            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
        </div>
        <div class="panel-body">

             <div class="col-md-12">
                        <?php
                        $sql= mysqli_query($dbcon,"SELECT * FROM `auto` WHERE `autostand_id`=".$k);
                        
                        
                        //$autos = mysqli_query($dbcon, "SELECT * FROM `autostand` WHERE `place_id`='" . $a . "' AND `status` =1");
                        while ($result2 = mysqli_fetch_array($sql)) {
                            
                            $aa=$result2['auto_id'];
                            $a=$result2['driver_name'];
                            $c = $result2['driver_mob'];
                            $d = $result2['driver_email'];



                            echo '<table>';
                            echo '<tr>';
                            echo '<td class="col-md-3">' . $d . '</td>';
                            echo '<td class="col-md-3"><img src="../../view/autostand/' . $c . '"  style="width:128px;height:128px"> </td>';
                            echo '<br>';
                            echo '<td class="col-md-3"> <input type="button" value="update" class="autoupdate"  data-autoid="'.$d .'" > </td>';

                            echo '</tr>';
                            echo '</table>';
                         
                            
                        }
                        ?>

                    </div>  


        </div>
    </div>
    
</div>



<script>
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '.panel div.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).ready(function () {
        $('.panel-heading span.clickable').click();
        $('.panel div.clickable').click();
    });

</script>

<script src="js/manage_auto.js"></script>

