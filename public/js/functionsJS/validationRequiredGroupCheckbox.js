/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/functionsJS/validationRequiredGroupCheckbox.js":
/*!*********************************************************************!*\
  !*** ./resources/js/functionsJS/validationRequiredGroupCheckbox.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// inizio validazione group input checkbox
// resources/views/admin/home.blade.php
var checkboxes = document.getElementsByClassName("mJS_checkbox");
var displayRequired = document.getElementById("mJS_displayRequired");
var checkboxTrue = 0;

var _loop = function _loop(i) {
  var checkbox = checkboxes[i];
  checkbox.addEventListener("click", function (e) {
    if (checkbox.checked) {
      // quando viene impostato un check nelle input in esame incremento una variabile interna dello script
      checkboxTrue++;
    } else if (!checkbox.checked && checkboxTrue > 0) {
      // quando viene tolto un check nelle input in esame decremento una variabile interna dello script
      checkboxTrue--;
    } // verifico se la variabile che tiene il conto dei check sulle input > 0 e imposto le classi adeguate


    if (checkboxTrue == 0) {
      displayRequired.classList.remove("ms_dysplay-none");
      displayRequired.classList.add("text-danger", "ms_dysplay-block");
    } else {
      displayRequired.classList.remove("text-danger", "ms_dysplay-block");
      displayRequired.classList.add("ms_dysplay-none");
    }
  });
};

for (var i = 0; i < checkboxes.length; i++) {
  _loop(i);
} // fine validazione group input checkbox
// ----------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------

/***/ }),

/***/ 3:
/*!***************************************************************************!*\
  !*** multi ./resources/js/functionsJS/validationRequiredGroupCheckbox.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Matteo\Documents\Progetto finale Boolean\DeliveBoo\resources\js\functionsJS\validationRequiredGroupCheckbox.js */"./resources/js/functionsJS/validationRequiredGroupCheckbox.js");


/***/ })

/******/ });