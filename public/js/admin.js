/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
var randomChartData = function randomChartData(n) {
  var data = [];

  for (var i = 0; i < n; i++) {
    data.push(Math.round(Math.random() * 200));
  }

  return data;
};

var chartColors = {
  "default": {
    primary: '#00D1B2',
    info: '#209CEE',
    danger: '#FF3860'
  }
};
var ctx = document.getElementById('matches-chart').getContext('2d');

if (ctx !== null) {
  data = JSON.parse(document.getElementById('matches-chart').getAttribute('data'));
  dataValues = Object.keys(data).map(function (key) {
    return data[key];
  });
  dataKeys = Object.keys(data);
  new Chart(ctx, {
    type: 'line',
    data: {
      datasets: [{
        fill: false,
        borderColor: chartColors["default"].primary,
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: chartColors["default"].primary,
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: chartColors["default"].primary,
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: dataValues
      }],
      labels: dataKeys
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      responsive: true,
      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: 'nearest',
        intersect: 0,
        position: 'nearest'
      },
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: 'transparent'
          },
          ticks: {
            padding: 20,
            fontColor: '#9a9a9a'
          }
        }],
        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(225,78,202,0.1)',
            zeroLineColor: 'transparent'
          },
          ticks: {
            padding: 20,
            fontColor: '#9a9a9a'
          }
        }]
      }
    }
  });
  /* Aside & Navbar: dropdowns */

  Array.from(document.getElementsByClassName('dropdown')).forEach(function (elA) {
    elA.addEventListener('click', function (e) {
      if (e.currentTarget.classList.contains('navbar-item')) {
        e.currentTarget.classList.toggle('active');
      } else {
        var dropdownIcon = e.currentTarget.getElementsByClassName('mdi')[1];
        e.currentTarget.parentNode.classList.toggle('active');
        dropdownIcon.classList.toggle('mdi-plus');
        dropdownIcon.classList.toggle('mdi-minus');
      }
    });
  });
}
/* Aside Mobile toggle */


Array.from(document.getElementsByClassName('mobile-aside-button')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.documentElement.classList.toggle('aside-mobile-expanded');
    dropdownIcon.classList.toggle('mdi-forwardburger');
    dropdownIcon.classList.toggle('mdi-backburger');
  });
});
/* NavBar menu mobile toggle */

Array.from(document.getElementsByClassName('--jb-navbar-menu-toggle')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName('icon')[0].getElementsByClassName('mdi')[0];
    document.getElementById(e.currentTarget.getAttribute('data-target')).classList.toggle('active');
    dropdownIcon.classList.toggle('mdi-dots-vertical');
    dropdownIcon.classList.toggle('mdi-close');
  });
});
/* Modal: open */

Array.from(document.getElementsByClassName('--jb-modal')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    var modalTarget = e.currentTarget.getAttribute('data-target');
    document.getElementById(modalTarget).classList.add('active');
    document.documentElement.classList.add('clipped');
  });
});
/* Modal: close */

Array.from(document.getElementsByClassName('--jb-modal-close')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    e.currentTarget.closest('.modal').classList.remove('active');
    document.documentElement.classList.remove('is-clipped');
  });
});
/* Notification dismiss */

Array.from(document.getElementsByClassName('--jb-notification-dismiss')).forEach(function (el) {
  el.addEventListener('click', function (e) {
    e.currentTarget.closest('.notification').classList.add('hidden');
  });
});
/******/ })()
;