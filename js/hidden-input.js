  var btns = ['btn-1','btn-2','btn-3','btn-4'];
  var input = document.getElementById('btn-input');
  for(var i = 0; i < btns.length; i++) {

    // on click, set set hidden input value and set background color
    document.getElementById(btns[i]).addEventListener('click', function() {
      input.value = this.value;

		// reset all inline styles
		for(var j = 0; j<btns.length; j++) {
			$('#' + btns[j]).attr("style"," ");
		};

      $('#' + this.id).attr("style","background-color:#CCC");
    });
  }