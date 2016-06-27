// JavaScript Document
function checkAddMedicineForm()
{
	with (window.document.frmAddMedicine) {
		if (isEmpty(txtName, 'Enter Medicine Name')) {
			return;
		} else if (isEmpty(txtFor, 'What is this Medicine for?')) {
			return;
		} else if (isEmpty(mtxDescription, 'Enter Description')) {
			return;
		} else if (isEmpty(txtQnty, 'Enter Quantity')) {
			return;
		} else {
			submit();
		}
	}
}

function checkPassword()
{
	with (window.document.frmAddMedicine) {
		if (isEmpty(txtPassword, 'Enter First Password')) {
			return;
		} else if (isEmpty(txtPassword2, 'Repeat Password')) {
			return;
		} else {
			submit();
		}
	}
}

function addMedicine()
{
	window.location.href = 'index.php?view=add';
}

function changePassword(MedicineId)
{
	window.location.href = 'index.php?view=modify&MedicineId=' + MedicineId;
}

function deleteMedicine(MedicineId)
{
	if (confirm('Delete this Medicine?')) {
		window.location.href = 'processMedicine.php?action=delete&MedicineId=' + MedicineId;
	}
}

