<link rel="stylesheet" href="assets/vendor/printJS/print.min.css">

<?php require_once('assets/components/footer.php'); ?>

<script src="assets/vendor/printJS/print.min.js"></script>

<form action="" id="form">

<h2>asdasda</h2>

<h1>smart checkbox group</h1>
<div class="row">
<form name="myform" class="two-up">
  <fieldset>
    <legend>Have you had any of these beers?</legend>
    <label>
      <input type="checkbox" name="checkboxname[]" value="Franziskaner Hefe-Weisse">Franziskaner Hefe-Weisse
    </label>
    <label>
      <input type="checkbox" name="checkboxname[]" value="Revolver Blood And Honey">Revolver Blood And Honey
    </label>
    <label>
      <input type="checkbox" name="checkboxname[]" value="Fat Tire">Fat Tire
    </label>
    <label>
      <input type="checkbox" name="checkboxname[]" value="St. Bernardus Tripel">St. Bernardus Tripel
    </label>
    <label>
      <input type="checkbox" name="checkboxname[]" value="none">none of the above
    </label>
  </fieldset>
</form>
<div id="output" class="two-up">Nothing Selected</div>

</div>

 

</form>
<button type="button" onclick="print()">
      Print PDF
  </button>
<script>
(function () {

var getChecked = function () {
  return $("input[name='checkboxname[]']:checked");
}

var getValues = function () {
  return getChecked()
  .map(function () {
    return this.value; 
  })
  .get();
};

var noneOfTheAbove = function (initiator) {
  var checked = getChecked();
  return checked.each(function () {
    var userClickedNone = initiator.value === 'none';
    var currentElIsNone = this.value === 'none';
    var uncheck = userClickedNone^currentElIsNone;
    
    if(uncheck) {
      $(this).prop('checked', false);
    }
  })
};

var output = function (e) {
  var initiator = typeof e !== 'undefined' ? e.target : {};
  var arr = getValues();
  if(arr.length > 0) {
    if(arr.indexOf('none') > -1) {
      noneOfTheAbove(initiator);
    }
  } 
}

$("input[name='checkboxname[]']").change(output);


}());


  print = () => {
    printJS({
      printable: 'form',
      type: 'html',
    })
  }
</script>
