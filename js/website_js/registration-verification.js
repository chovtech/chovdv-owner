const els = (sel, par) => (par || document).querySelectorAll(sel);

      // Task: multiple inputs "field"
      
  els(".pin").forEach((elGroup) => {
      
        const elsInput = [...elGroup.children];
        const len = elsInput.length;
        
        const handlePaste = (ev) => {
          const clip = ev.clipboardData.getData('text');     // Get clipboard data
          const pin = clip.replace(/\s/g, "");               // Sanitize string
          const ch = [...pin];                               // Create array of chars
          elsInput.forEach((el, i) => el.value = ch[i]??""); // Populate inputs
          elsInput[pin.length - 1].focus();                  // Focus input
        };
      
        const handleInput = (ev) => {
          const elInp = ev.currentTarget;
          const i = elsInput.indexOf(elInp);
          if (elInp.value && (i+1) % len) elsInput[i + 1].focus();  // focus next
        };
        
        const handleKeyDn = (ev) => {
          const elInp = ev.currentTarget
          const i = elsInput.indexOf(elInp);
          if (!elInp.value && ev.key === "Backspace" && i) elsInput[i - 1].focus(); // Focus previous
        };


    // Add the same events to every input in group:
    elsInput.forEach(elInp => {
      elInp.addEventListener("paste", handlePaste);   // Handle pasting
      elInp.addEventListener("input", handleInput);   // Handle typing
      elInp.addEventListener("keydown", handleKeyDn); // Handle deleting
    });

});
 

 var input = document.getElementById("idone");

input.onkeypress = function(evt) {
    evt = evt || window.event;
    if (!evt.ctrlKey && !evt.metaKey && !evt.altKey) {
        var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
        if (charCode && !/\d/.test(String.fromCharCode(charCode))) {
            return false;
        }
    }
};


var input_two = document.getElementById("idtwo");

input_two.onkeypress = function(evt) {
    evt = evt || window.event;
    if (!evt.ctrlKey && !evt.metaKey && !evt.altKey) {
        var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
        if (charCode && !/\d/.test(String.fromCharCode(charCode))) {
            return false;
        }
    }
};

var input_three = document.getElementById("idthree");

input_three.onkeypress = function(evt) {
    evt = evt || window.event;
    if (!evt.ctrlKey && !evt.metaKey && !evt.altKey) {
        var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
        if (charCode && !/\d/.test(String.fromCharCode(charCode))) {
            return false;
        }
    }
};


var input_four = document.getElementById("idfour");

input_four.onkeypress = function(evt) {
    evt = evt || window.event;
    if (!evt.ctrlKey && !evt.metaKey && !evt.altKey) {
        var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
        if (charCode && !/\d/.test(String.fromCharCode(charCode))) {
            return false;
        }
    }
};



var input_five = document.getElementById("idfive");

input_five.onkeypress = function(evt) {
    evt = evt || window.event;
    if (!evt.ctrlKey && !evt.metaKey && !evt.altKey) {
        var charCode = (typeof evt.which == "undefined") ? evt.keyCode : evt.which;
        if (charCode && !/\d/.test(String.fromCharCode(charCode))) {
            return false;
        }
    }
};