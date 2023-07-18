function drawPlot(id, xArray, yArray){
    let chartDiv = document.getElementById(id);
    const data = 
                [
                    {
                        x: xArray,
                        y: yArray,
                        type: "bar"
                    }
                ];
    const layout = {title:"Viewability statistic:"};
    Plotly.newPlot(chartDiv, data, layout);      
}

