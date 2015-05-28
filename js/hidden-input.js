  var btns = ['btn-1','btn-2','btn-3','btn-4'];
  var input = document.getElementById('btn-input');
  for(var i = 0; i < btns.length; i++) {
    document.getElementById(btns[i]).addEventListener('click', function() {
      input.value = this.value;
    });
  }