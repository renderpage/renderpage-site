/*!
 * RenderPage JavaScript Library 1.0.0a
 * http://renderpage.org/
 */

var RenderPage = function (foo) {
  return new RenderPage.init(foo);
};

if (!$) { // jQuery conflict
  var $ = RenderPage;
}

RenderPage.init = function (foo) {
  if (foo) {
    if (typeof foo === "string") {
      this.elements = document.querySelectorAll(foo);
    } else {
      this.elements[0] = foo;
    }
  }
};

RenderPage.init.prototype = {
  elements: [],

  // Get element by index
  get: function (i) {
    return this.elements[i];
  },

  // Get parent element
  parent: function () {
    return RenderPage(this.elements[0].parentNode);
  },

  // Get/set the value of the attribute of an element
  attribute: function (name, value) {
    if (value) {
      for (var i = 0; i < this.elements.length; ++i) {
        this.elements[i].setAttribute(name, value);
      }
    } else {
      if (this.elements.length > 1) {
        return false;
      }

      return this.elements[0].getAttribute(name);
    }
  },

  // Get/set the value of the data attribute of an element
  data: function (name, value) {
    return this.attribute("data-" + name, value);
  },

  // Get/set the value of innerHTML of an element
  html: function (value) {
    if (value) {
      for (var i = 0; i < this.elements.length; ++i) {
        this.elements[i].innerHTML = value;
      }
    } else {
      if (this.elements.length > 1) {
        return false;
      }

      return this.elements[0].innerHTML;
    }
  },

  // Add class name to elements
  addClass: function (className) {
    for (var i = 0; i < this.elements.length; ++i) {
      this.elements[i].classList.add(className);
    }
  },

  // Remove class name from elements
  removeClass: function (className) {
    for (var i = 0; i < this.elements.length; ++i) {
      this.elements[i].classList.remove(className);
    }
  },

  // Toggles between a class name for elements
  toggleClass: function (className) {
    for (var i = 0; i < this.elements.length; ++i) {
      this.elements[i].classList.toggle(className);
    }
  },

  // Returns a Boolean value, indicating whether an element has the specified class name
  hasClass: function (className) {
    for (var i = 0; i < this.elements.length; ++i) {
      if (this.elements[i].classList.contains(className)) {
        return true;
      }
    }

    return false;
  },

  // Events: onclick
  click: function (handler) {
    for (var i = 0; i < this.elements.length; ++i) {
      this.elements[i].onclick = handler;
    }
  }
};

// DOM ready
RenderPage.ready = function (handler) {
  document.addEventListener("DOMContentLoaded", handler);
};

// Load JSON data from a GET request
RenderPage.getJSON = function (url, callback) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function() {
    if (request.readyState === 4) {
      callback(JSON.parse(request.responseText));
    }
  }

  request.open("GET", url, true);
  request.send();
};
