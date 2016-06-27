<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<p class="errorMessage">&nbsp;</p>
<form action="process.php?action=add" method="post" enctype="multipart/form-data" name="frmAddMedicine" id="frmAddMedicine">
 <input name="txtUser" type="hidden" value="<?php echo $session;?>">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
  <tr>   
  <th  class="content">Doctor: </th>
   <td class="content"> <select name="doctor"><option>Dr.Gilbert Alojada</option>
   <option>Dr. Rodolfo Escalona jr.</option>
   <option>Dr. Janeen Ruth Aricaya</option>
   </select>
  </tr>
  
  <tr> 
   <th align="left"  class="content">Date:</th>
   <td class="content"> 
   <select name="year">
   <option value=''>-Year-</option>
   <option>2014</option>
   <option>2015</option>
   <option>2016</option>
   <option>2017</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option>
   </select>
   <select name="month">
   <option value=''>-Month-</option>
   <option>01</option>
   <option>02</option>
   <option>03</option>
   <option>04</option>
   <option>05</option>
   <option>06</option>
   <option>07</option>
   <option>08</option>
   <option>09</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
   </select>
   <select name="day">
   <option value=''>-Day-</option>
   <option>01</option>
   <option>02</option>
   <option>03</option>
   <option>04</option>
   <option>05</option>
   <option>06</option>
   <option>07</option>
   <option>08</option>
   <option>09</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
   <option>13</option>
   <option>14</option>
   <option>15</option>
   <option>16</option>
   <option>17</option>
   <option>18</option>
   <option>19</option>
   <option>20</option>
   <option>21</option>
   <option>22</option>
   <option>23</option>
   <option>24</option>
   <option>25</option>
   <option>26</option>
   <option>27</option>
   <option>28</option>
   <option>29</option>
   <option>30</option>
   <option>31</option>
   </select>
  </tr>
    <tr> 
   <th align="left"  valign="top" class="content">Reason:</th>
   <td class="content"> <textarea name="reason" cols="100" rows="10"  class="form-textarea" id="mtxDescription"></textarea>
      <td><br><br></td>
   </td>
  </tr>
  </tr>

      
 
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddMedicine" type="submit" id="btnAddMedicine" value="File Absence" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>