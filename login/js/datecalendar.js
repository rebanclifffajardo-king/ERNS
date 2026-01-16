// populate the years select list
var codeYear = "";
codeYear += "<select id='year1' onchange=\"SelDate('day1','month1','year1');\">";
codeYear += "<option value='--'>- Year -</option>"			 
for (var i = 2015; i >= 1900; i--) {
codeYear += "<option value='" + i + "' >" + i + "</option>";
}			   
codeYear += "</select>";
document.write(codeYear);

function SelDate(d,m,y) {
var dy=document.getElementById(d);
var mth=document.getElementById(m);
var yr=document.getElementById(y);
dy.options.length=1;
if (mth.value && yr.value) {
var days=new Date(yr.value,mth.value,1,-1).getDate(); // the first day of the next month minus 1 hour
for (var i=1; i<=days; i++){
dy.options[i] = new Option(i,i,true,true);
}
dy.selectedIndex = 0;
}
}