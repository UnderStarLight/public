var a = 1;
var a1 = document.getElementById('input').value;
let waitingTime;
timeWorker();
function timeWorker() {
  clearTimeout(waitingTime);
  let re = new XMLHttpRequest();
  re.open('post', 'main.php');
  re.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  a1 = document.getElementById('input').value;
  // 发送数据
  let number = random(1, 9);
  re.send("id=" + a1 + "&no=" + number);
  re.onreadystatechange = () => {
    if(re.readyState == 4 && re.status == 200) {
      document.getElementById('tt').innerHTML = re.responseText;
      // 每秒执行一次此函数
      setTimeout("timeWorker()", 1000);
    }
  }
}
// 创建随机数
function random(min, max) {
  let min1 = Math.ceil(min);
  let max1 = Math.floor(max);
  return Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
}