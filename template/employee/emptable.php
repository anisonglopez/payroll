<link rel="stylesheet" href="dependencies/bootstrap-4.1.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dependencies/css/custom-main.css">
<h1>ข้อมูลพนักงาน</h1>
<hr>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal_adduser">Create New</button>
    </div>
    <div class="col-sm" style="text-align: right;">
    <form action="" method="post">
<input type="hidden" name="direct" value="true" />
Search: <input type="text" name="domain" size="20" /> 
<input type="submit" value="Search" class="btn btn-success"  style="display: inline-block"/>
<input type="submit" value="Print" class="btn btn-info"  style="display: inline-block"/>
</form>
</div>
</div>
</div>
<div class="col-md-12"><br /></div>
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">รหัสพนักงาน</th>
      <th scope="col">ประเภทพนักงาน</th>
      <th scope="col">ชื่อพนักงาน</th>
      <th scope="col">แผนก</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">เพศ</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php while ($rows = mysql_fetch_array($DATA)) {
    $EmplCode = $rows['EmplCode'];
    $EmplType = $rows['EmplType'];
    $EmplTName = $rows['EmplTName'];
    $DeptTDesc = $rows['DeptTDesc'];
    $PosiTDesc = $rows['PosiTDesc'];
    $Sex = $rows['Sex'];
  ?>
  <tbody>
    <tr>
      <td><?php echo $EmplCode; ?></td>
      <td><?php echo $EmplType; ?></td>
      <td><?php echo $EmplTName; ?></td>
      <td><?php echo $DeptTDesc; ?></td>
      <td><?php echo $PosiTDesc; ?></td>
      <td>
        <?php 
          if($Sex == "F"){
            echo "หญิง";
          }else{
            echo "ชาย";
          } 
        ?>
      </td>
      <td><button type="button" class="btn btn-outline-warning">Edit</button>| <button type="button" class="btn btn-outline-danger">Delete</button></td>
    </tr>
  </tbody>
<?php
}
  ?>
</table>
<p> Show:
<select>
  <option value="10">10</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="100">100</option>
</select>
entries
</p>
<div class="modal fade" id="modal_adduser" tabindex="-1" role="dialog" aria-labelledby="adduserModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 600px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="adduserModalLabel">เพิ่มข้อมูลพนักงาน</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal col-sm-12" name="add_user" method="post"  action="<?= $_SERVER['PHP_SELF'];?>">
      <div class="modal-body">
          <table class="table table-bordered">
            <tr>  
                <td width="30%" align="right"><label>รหัสการลา</label></td>  
                <td width="70%"><input name="email" type="email" data-placement="top" required  class="form-control"/></td> 
            </tr> 
            <tr>
                <td width="30%" align="right"><label>คำอธิบาย(EN)</label></td>
                <td width="70%"> <input name="email" type="email" data-placement="top" required  class="form-control"/></td> 
            </tr>  
            <tr>
                <td width="30%" align="right"><label>คำอธิบาย(TH)</label></td>
                <td width="70%"><input name="description" type="text"  class="form-control"/></td> 
            </tr> 
            <tr>
                <td width="30%" align="right"><label>Deduct Flag</label></td>
                <td width="70%"><input type="checkbox" '.$checked.' name="active" id="xxx" onclick="calc();" /></td>  
            </tr> 
            <tr>
                <td width="30%" align="right"><label>อัตราหัก</label></td>
                <td width="70%"><input name="description" type="text" class="form-control"/></td> 
            </tr> 
          </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="modal_adduser_submit_btn">Save</button>
      </div>
      
      </form>
    </div>
  </div>
</div>