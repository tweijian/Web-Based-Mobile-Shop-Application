$(document).ready(function(){
  let currentURL = window.location.href;
  let url = new URL(currentURL);
  let platformID = url.searchParams.get("platformID");
  $.ajax({
    url: "http://localhost:8080/JasonGadget/ScoreData2.php?platformID=" + platformID,
    method: "GET",
    success: function(data) {
      var performanceName = [];
      var performanceScore = [];
      var mainCameraName = [];
      var mainCameraScore = [];
      var frontCameraName = [];
      var frontCameraScore = [];
      var displayName = [];
      var displayScore = [];
      var batteryLifeName = [];
      var batteryLifeScore = [];
      for(var i in data.performance) {
        performanceName.push(data.performance[i].name + " " + data.performance[i].model);
        performanceScore.push(data.performance[i].performanceScore);
      }
      for(var i in data.mainCamera) {
        mainCameraName.push(data.mainCamera[i].name + " " + data.mainCamera[i].model);
        mainCameraScore.push(data.mainCamera[i].mainCameraScore);
      }
      for(var i in data.frontCamera) {
        frontCameraName.push(data.frontCamera[i].name + " " + data.frontCamera[i].model);
        frontCameraScore.push(data.frontCamera[i].frontCameraScore);
      }
      for(var i in data.display) {
        displayName.push(data.display[i].name + " " + data.display[i].model);
        displayScore.push(data.display[i].displayScore);
      }
      for(var i in data.batteryLife) {
        batteryLifeName.push(data.batteryLife[i].name + " " + data.batteryLife[i].model);
        batteryLifeScore.push(data.batteryLife[i].batteryLifeScore);
      }
      var chartdata = {
        labels: performanceName,
        datasets : [
          {
            label: 'Device Performance Score',
            backgroundColor: 'rgba(255,69,0, 1)',
            borderColor: 'rgba(255,69,0, 1)',
            hoverBackgroundColor: 'rgba(255,99,71, 0.75)',
            hoverBorderColor: 'rgba(255,99,71, 0.75)',
            data: performanceScore
          }
        ]
      };
      var chartdata2 = {
        labels: mainCameraName,
        datasets : [
          {
            label: 'Device Main Camera Score',
            backgroundColor: 'rgba(50,205,50, 1)',
            borderColor: 'rgba(50,205,50, 1)',
            hoverBackgroundColor: 'rgba(144,238,144, 0.75)',
            hoverBorderColor: 'rgba(144,238,144, 0.75)',
            data: mainCameraScore
          }
        ]
      };
      var chartdata3 = {

        labels: frontCameraName,
        datasets : [
          {
            label: 'Device Front Camera Score',
            backgroundColor: 'rgba(255,255,0, 1)',
            borderColor: 'rgba(255,255,0, 1)',
            hoverBackgroundColor: 'rgba(253,253,150, 0.75)',
            hoverBorderColor: 'rgba(253,253,150, 0.75)',
            data: frontCameraScore
          }
        ]
      };
      var chartdata4 = {
        labels: displayName,
        datasets : [
          {
            label: 'Device Display Score',
            backgroundColor: 'rgba(65,105,225, 1)',
            borderColor: 'rgba(65,105,225, 1)',
            hoverBackgroundColor: 'rgba(0,191,255, 0.75)',
            hoverBorderColor: 'rgba(0,191,255, 0.75)',
            data: displayScore
          }
        ]
      };
      var chartdata5 = {
        labels: batteryLifeName,
        datasets : [
          {
            label: 'Device Battery Life Score',
            backgroundColor: 'rgba(128, 0, 255, 1)',
            borderColor: 'rgba(128, 0, 255, 1)',
            hoverBackgroundColor: 'rgba(191, 0, 255, 0.75)',
            hoverBorderColor: 'rgba(191, 0, 255, 0.75)',
            data: batteryLifeScore
          }
        ]
      };
     
      var ctx = $("#mycanvas")[0];
      var ctx2 = $("#mycanvas2")[0];
      var ctx3 = $("#mycanvas3")[0];
      var ctx4 = $("#mycanvas4")[0];
      var ctx5 = $("#mycanvas5")[0];

      new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
      new Chart(ctx2, {
        type: 'bar',
        data: chartdata2
      });
      new Chart(ctx3, {
        type: 'bar',
        data: chartdata3
      });
      new Chart(ctx4, {
        type: 'bar',
        data: chartdata4
      });
      new Chart(ctx5, {
        type: 'bar',
        data: chartdata5
      });
      
    },
    error: function(data) {
      console.log(data);
    }
  });
});