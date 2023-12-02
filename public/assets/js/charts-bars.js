/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const barConfig = {
    type: "bar",
    data: {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],
        datasets: [
            {
                label: "Shoes",
                backgroundColor: "#0694a2",
                // borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110],
            },
        ],
    },
    options: {
        responsive: true,
        legend: {
            display: false,
        },
    },
};

const barsCtx = document.getElementById("bars");
window.myBar = new Chart(barsCtx, barConfig);
