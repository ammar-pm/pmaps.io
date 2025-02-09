/**
 * C3 charts page
 */
(function() {
  'use strict';

  /******** Chart 1 ********/

  var chart = c3.generate({
    data: {
      columns: [
        ['Industrial', 30, 200, 100, 400, 150, 250, 50, 100, 250],
        ['Commercial', 50, 20, 10, 40, 15, 25, 50, 30, 40],
        ['Agricultural', 130, 150, 200, 300, 200, 100, 150, 160, 100],
        ['Residential', 30, 35, 37, 62, 40, 45, 47, 50, 45]
      ]
    }
  });


  /******** Chart 2 ********/

  c3.generate({
    bindto: '#chart2',
    data: {
      columns: [
        ['data1', 30, 200, 100, 400, 150, 250, 50, 100, 250],
        ['data2', 130, 100, 140, 200, 150, 50, 120, 80, 60]
      ],
      type: 'bar'
    },
    bar: {
      width: {
        ratio: 0.5
      }
    }
  });
})();
