<html>
<head>
    <style>
        #sidebar{
            border: none;
            background-color: cadetblue;
            color: floralwhite;
            padding: 2%;
            width: 100%;
            float: left;
        }
        #main{
            padding-top:20%;
            padding-left: 39%;
        }
    </style>
</head>
    <body style="margin:0px;">
    <div id="sidebar">
    <a href="#" style="color: floralwhite; font-family: Calibri; font-size: large;">Home</a>
    </div>
    <div id="main">

            <select name="viewtype" onChange="window.open(this.value,'_parent')">
                <option disabled selected hidden>Please Choose...</option>
              <option value="view.php">Cosmic VFAT Channels</option>
                <option value="view2.php">GEM AMC13 Configuration</option>
                <option value="view3.php">GEM Chamber Parts</option>
                <option value="view4.php">GEM IPADRS Map</option>
                <option value="view5.php">GEM QC2 Fast Data</option>
                <option value="view6.php">GEM Superchamber OPTHYB VFATS</option>
                <option value="view7.php">GEM Superchamber Parts</option>
                <option value="view8.php">GEM VFAT Channels</option>
                <option value="view9.php">GEM VFAT2 Channel Set</option>
                <option value="view10.php">GEM VFAT2 Configurations</option>
                <option value="view11.php">V Chamber VFAT Chan</option>
                <option value="view12.php">V CMS GEM Chamber VFATS</option>
            </select>
            <input type="submit">

    </div>
    </body>
</html>
