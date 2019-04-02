/*
 Highcharts JS v7.0.2 (2019-01-17)

 (c) 2014-2019 Highsoft AS
 Authors: Jon Arild Nygard / Oystein Moseng

 License: www.highcharts.com/license
*/
(function(q){"object"===typeof module&&module.exports?(q["default"]=q,module.exports=q):"function"===typeof define&&define.amd?define(function(){return q}):q("undefined"!==typeof Highcharts?Highcharts:void 0)})(function(q){var C=function(b){var v=b.extend,q=b.isArray,g=b.isObject,t=b.isNumber,B=b.merge,y=b.pick;return{getColor:function(r,l){var w=l.index,n=l.mapOptionsToLevel,g=l.parentColor,x=l.parentColorIndex,p=l.series,e=l.colors,q=l.siblings,h=p.points,v=p.chart.options.chart,z,t,a,c;if(r){h=
h[r.i];r=n[r.level]||{};if(n=h&&r.colorByPoint)t=h.index%(e?e.length:v.colorCount),z=e&&e[t];if(!p.chart.styledMode){e=h&&h.options.color;v=r&&r.color;if(a=g)a=(a=r&&r.colorVariation)&&"brightness"===a.key?b.color(g).brighten(w/q*a.to).get():g;a=y(e,v,z,a,p.color)}c=y(h&&h.options.colorIndex,r&&r.colorIndex,t,x,l.colorIndex)}return{color:a,colorIndex:c}},getLevelOptions:function(b){var l=null,w,n,r,x;if(g(b))for(l={},r=t(b.from)?b.from:1,x=b.levels,n={},w=g(b.defaults)?b.defaults:{},q(x)&&(n=x.reduce(function(b,
e){var l,h;g(e)&&t(e.level)&&(h=B({},e),l="boolean"===typeof h.levelIsConstant?h.levelIsConstant:w.levelIsConstant,delete h.levelIsConstant,delete h.level,e=e.level+(l?0:r-1),g(b[e])?v(b[e],h):b[e]=h);return b},{})),x=t(b.to)?b.to:1,b=0;b<=x;b++)l[b]=B({},w,g(n[b])?n[b]:{});return l},setTreeValues:function l(b,n){var g=n.before,w=n.idRoot,p=n.mapIdToNode[w],e=n.points[b.i],t=e&&e.options||{},h=0,q=[];v(b,{levelDynamic:b.level-(("boolean"===typeof n.levelIsConstant?n.levelIsConstant:1)?0:p.level),
name:y(e&&e.name,""),visible:w===b.id||("boolean"===typeof n.visible?n.visible:!1)});"function"===typeof g&&(b=g(b,n));b.children.forEach(function(e,g){var a=v({},n);v(a,{index:g,siblings:b.children.length,visible:b.visible});e=l(e,a);q.push(e);e.visible&&(h+=e.val)});b.visible=0<h||b.visible;g=y(t.value,h);v(b,{children:q,childrenTotal:h,isLeaf:b.visible&&!h,val:g});return b},updateRootId:function(b){var l;g(b)&&(l=g(b.options)?b.options:{},l=y(b.rootNode,l.rootId,""),g(b.userOptions)&&(b.userOptions.rootId=
l),b.rootNode=l);return l}}}(q);(function(b,q){var v=b.seriesType,g=b.seriesTypes,t=b.merge,B=b.extend,y=b.noop,r=q.getColor,l=q.getLevelOptions,w=b.isArray,n=b.isNumber,C=b.isObject,x=b.isString,p=b.pick,e=b.Series,E=b.stableSort,h=b.Color,F=function(a,c,d){d=d||this;b.objectEach(a,function(b,f){c.call(d,b,f,a)})},z=function(a,c,d){d=d||this;a=c.call(d,a);!1!==a&&z(a,c,d)},G=q.updateRootId;v("treemap","scatter",{showInLegend:!1,marker:!1,colorByPoint:!1,dataLabels:{enabled:!0,defer:!1,verticalAlign:"middle",
formatter:function(){var a=this&&this.point?this.point:{};return x(a.name)?a.name:""},inside:!0},tooltip:{headerFormat:"",pointFormat:"\x3cb\x3e{point.name}\x3c/b\x3e: {point.value}\x3cbr/\x3e"},ignoreHiddenPoint:!0,layoutAlgorithm:"sliceAndDice",layoutStartingDirection:"vertical",alternateStartingDirection:!1,levelIsConstant:!0,drillUpButton:{position:{align:"right",x:-10,y:10}},borderColor:"#e6e6e6",borderWidth:1,opacity:.15,states:{hover:{borderColor:"#999999",brightness:g.heatmap?0:.1,halo:!1,
opacity:.75,shadow:!1}}},{pointArrayMap:["value"],directTouch:!0,optionalAxis:"colorAxis",getSymbol:y,parallelArrays:["x","y","value","colorValue"],colorKey:"colorValue",trackerGroups:["group","dataLabelsGroup"],getListOfParents:function(a,c){a=w(a)?a:[];var d=w(c)?c:[];c=a.reduce(function(a,c,d){c=p(c.parent,"");void 0===a[c]&&(a[c]=[]);a[c].push(d);return a},{"":[]});F(c,function(a,c,b){""!==c&&-1===d.indexOf(c)&&(a.forEach(function(a){b[""].push(a)}),delete b[c])});return c},getTree:function(){var a=
this.data.map(function(a){return a.id}),a=this.getListOfParents(this.data,a);this.nodeMap=[];return this.buildNode("",-1,0,a,null)},init:function(a,c){var d=b.colorSeriesMixin;b.colorSeriesMixin&&(this.translateColors=d.translateColors,this.colorAttribs=d.colorAttribs,this.axisTypes=d.axisTypes);e.prototype.init.call(this,a,c);this.options.allowDrillToNode&&b.addEvent(this,"click",this.onClickDrillToNode)},buildNode:function(a,c,d,b,f){var m=this,u=[],k=m.points[c],D=0,e;(b[a]||[]).forEach(function(c){e=
m.buildNode(m.points[c].id,c,d+1,b,a);D=Math.max(e.height+1,D);u.push(e)});c={id:a,i:c,children:u,height:D,level:d,parent:f,visible:!1};m.nodeMap[c.id]=c;k&&(k.node=c);return c},setTreeValues:function(a){var c=this,d=c.options,b=c.nodeMap[c.rootNode],d="boolean"===typeof d.levelIsConstant?d.levelIsConstant:!0,f=0,A=[],u,k=c.points[a.i];a.children.forEach(function(a){a=c.setTreeValues(a);A.push(a);a.ignore||(f+=a.val)});E(A,function(a,c){return a.sortIndex-c.sortIndex});u=p(k&&k.options.value,f);k&&
(k.value=u);B(a,{children:A,childrenTotal:f,ignore:!(p(k&&k.visible,!0)&&0<u),isLeaf:a.visible&&!f,levelDynamic:a.level-(d?0:b.level),name:p(k&&k.name,""),sortIndex:p(k&&k.sortIndex,-u),val:u});return a},calculateChildrenAreas:function(a,c){var d=this,b=d.options,f=d.mapOptionsToLevel[a.level+1],A=p(d[f&&f.layoutAlgorithm]&&f.layoutAlgorithm,b.layoutAlgorithm),u=b.alternateStartingDirection,k=[];a=a.children.filter(function(a){return!a.ignore});f&&f.layoutStartingDirection&&(c.direction="vertical"===
f.layoutStartingDirection?0:1);k=d[A](c,a);a.forEach(function(a,b){b=k[b];a.values=t(b,{val:a.childrenTotal,direction:u?1-c.direction:c.direction});a.pointValues=t(b,{x:b.x/d.axisRatio,width:b.width/d.axisRatio});a.children.length&&d.calculateChildrenAreas(a,a.values)})},setPointValues:function(){var a=this,c=a.xAxis,d=a.yAxis;a.points.forEach(function(b){var f=b.node,m=f.pointValues,u,k,e=0;a.chart.styledMode||(e=(a.pointAttribs(b)["stroke-width"]||0)%2/2);m&&f.visible?(f=Math.round(c.translate(m.x,
0,0,0,1))-e,u=Math.round(c.translate(m.x+m.width,0,0,0,1))-e,k=Math.round(d.translate(m.y,0,0,0,1))-e,m=Math.round(d.translate(m.y+m.height,0,0,0,1))-e,b.shapeType="rect",b.shapeArgs={x:Math.min(f,u),y:Math.min(k,m),width:Math.abs(u-f),height:Math.abs(m-k)},b.plotX=b.shapeArgs.x+b.shapeArgs.width/2,b.plotY=b.shapeArgs.y+b.shapeArgs.height/2):(delete b.plotX,delete b.plotY)})},setColorRecursive:function(a,c,d,b,f){var m=this,e=m&&m.chart,e=e&&e.options&&e.options.colors,k;if(a){k=r(a,{colors:e,index:b,
mapOptionsToLevel:m.mapOptionsToLevel,parentColor:c,parentColorIndex:d,series:m,siblings:f});if(c=m.points[a.i])c.color=k.color,c.colorIndex=k.colorIndex;(a.children||[]).forEach(function(c,d){m.setColorRecursive(c,k.color,k.colorIndex,d,a.children.length)})}},algorithmGroup:function(a,c,d,b){this.height=a;this.width=c;this.plot=b;this.startDirection=this.direction=d;this.lH=this.nH=this.lW=this.nW=this.total=0;this.elArr=[];this.lP={total:0,lH:0,nH:0,lW:0,nW:0,nR:0,lR:0,aspectRatio:function(a,c){return Math.max(a/
c,c/a)}};this.addElement=function(a){this.lP.total=this.elArr[this.elArr.length-1];this.total+=a;0===this.direction?(this.lW=this.nW,this.lP.lH=this.lP.total/this.lW,this.lP.lR=this.lP.aspectRatio(this.lW,this.lP.lH),this.nW=this.total/this.height,this.lP.nH=this.lP.total/this.nW,this.lP.nR=this.lP.aspectRatio(this.nW,this.lP.nH)):(this.lH=this.nH,this.lP.lW=this.lP.total/this.lH,this.lP.lR=this.lP.aspectRatio(this.lP.lW,this.lH),this.nH=this.total/this.width,this.lP.nW=this.lP.total/this.nH,this.lP.nR=
this.lP.aspectRatio(this.lP.nW,this.nH));this.elArr.push(a)};this.reset=function(){this.lW=this.nW=0;this.elArr=[];this.total=0}},algorithmCalcPoints:function(a,c,d,b){var f,m,e,k,l=d.lW,h=d.lH,g=d.plot,n,q=0,p=d.elArr.length-1;c?(l=d.nW,h=d.nH):n=d.elArr[d.elArr.length-1];d.elArr.forEach(function(a){if(c||q<p)0===d.direction?(f=g.x,m=g.y,e=l,k=a/e):(f=g.x,m=g.y,k=h,e=a/k),b.push({x:f,y:m,width:e,height:k}),0===d.direction?g.y+=k:g.x+=e;q+=1});d.reset();0===d.direction?d.width-=l:d.height-=h;g.y=
g.parent.y+(g.parent.height-d.height);g.x=g.parent.x+(g.parent.width-d.width);a&&(d.direction=1-d.direction);c||d.addElement(n)},algorithmLowAspectRatio:function(a,c,d){var b=[],f=this,e,g={x:c.x,y:c.y,parent:c},k=0,l=d.length-1,h=new this.algorithmGroup(c.height,c.width,c.direction,g);d.forEach(function(d){e=d.val/c.val*c.height*c.width;h.addElement(e);h.lP.nR>h.lP.lR&&f.algorithmCalcPoints(a,!1,h,b,g);k===l&&f.algorithmCalcPoints(a,!0,h,b,g);k+=1});return b},algorithmFill:function(a,c,d){var b=
[],f,e=c.direction,g=c.x,k=c.y,h=c.width,l=c.height,n,q,p,r;d.forEach(function(d){f=d.val/c.val*c.height*c.width;n=g;q=k;0===e?(r=l,p=f/r,h-=p,g+=p):(p=h,r=f/p,l-=r,k+=r);b.push({x:n,y:q,width:p,height:r});a&&(e=1-e)});return b},strip:function(a,c){return this.algorithmLowAspectRatio(!1,a,c)},squarified:function(a,c){return this.algorithmLowAspectRatio(!0,a,c)},sliceAndDice:function(a,c){return this.algorithmFill(!0,a,c)},stripes:function(a,c){return this.algorithmFill(!1,a,c)},translate:function(){var a=
this,c=a.options,d=G(a),b,f;e.prototype.translate.call(a);f=a.tree=a.getTree();b=a.nodeMap[d];a.mapOptionsToLevel=l({from:b.level+1,levels:c.levels,to:f.height,defaults:{levelIsConstant:a.options.levelIsConstant,colorByPoint:c.colorByPoint}});""===d||b&&b.children.length||(a.drillToNode("",!1),d=a.rootNode,b=a.nodeMap[d]);z(a.nodeMap[a.rootNode],function(c){var d=!1,b=c.parent;c.visible=!0;if(b||""===b)d=a.nodeMap[b];return d});z(a.nodeMap[a.rootNode].children,function(a){var c=!1;a.forEach(function(a){a.visible=
!0;a.children.length&&(c=(c||[]).concat(a.children))});return c});a.setTreeValues(f);a.axisRatio=a.xAxis.len/a.yAxis.len;a.nodeMap[""].pointValues=d={x:0,y:0,width:100,height:100};a.nodeMap[""].values=d=t(d,{width:d.width*a.axisRatio,direction:"vertical"===c.layoutStartingDirection?0:1,val:f.val});a.calculateChildrenAreas(f,d);a.colorAxis?a.translateColors():c.colorByPoint||a.setColorRecursive(a.tree);c.allowDrillToNode&&(c=b.pointValues,a.xAxis.setExtremes(c.x,c.x+c.width,!1),a.yAxis.setExtremes(c.y,
c.y+c.height,!1),a.xAxis.setScale(),a.yAxis.setScale());a.setPointValues()},drawDataLabels:function(){var a=this,c=a.mapOptionsToLevel,b,m;a.points.filter(function(a){return a.node.visible}).forEach(function(d){m=c[d.node.level];b={style:{}};d.node.isLeaf||(b.enabled=!1);m&&m.dataLabels&&(b=t(b,m.dataLabels),a._hasPointLabels=!0);d.shapeArgs&&(b.style.width=d.shapeArgs.width,d.dataLabel&&d.dataLabel.css({width:d.shapeArgs.width+"px"}));d.dlOptions=t(b,d.options.dataLabels)});e.prototype.drawDataLabels.call(this)},
alignDataLabel:function(a,c,d){var e=d.style;!b.defined(e.textOverflow)&&c.text&&c.getBBox().width>c.text.textWidth&&c.css({textOverflow:"ellipsis",width:e.width+="px"});g.column.prototype.alignDataLabel.apply(this,arguments);a.dataLabel&&a.dataLabel.attr({zIndex:(a.node.zIndex||0)+1})},pointAttribs:function(a,c){var b=C(this.mapOptionsToLevel)?this.mapOptionsToLevel:{},e=a&&b[a.node.level]||{},b=this.options,f=c&&b.states[c]||{},g=a&&a.getClassName()||"";a={stroke:a&&a.borderColor||e.borderColor||
f.borderColor||b.borderColor,"stroke-width":p(a&&a.borderWidth,e.borderWidth,f.borderWidth,b.borderWidth),dashstyle:a&&a.borderDashStyle||e.borderDashStyle||f.borderDashStyle||b.borderDashStyle,fill:a&&a.color||this.color};-1!==g.indexOf("highcharts-above-level")?(a.fill="none",a["stroke-width"]=0):-1!==g.indexOf("highcharts-internal-node-interactive")?(c=p(f.opacity,b.opacity),a.fill=h(a.fill).setOpacity(c).get(),a.cursor="pointer"):-1!==g.indexOf("highcharts-internal-node")?a.fill="none":c&&(a.fill=
h(a.fill).brighten(f.brightness).get());return a},drawPoints:function(){var a=this,c=a.points.filter(function(a){return a.node.visible});c.forEach(function(c){var b="level-group-"+c.node.levelDynamic;a[b]||(a[b]=a.chart.renderer.g(b).attr({zIndex:1E3-c.node.levelDynamic}).add(a.group));c.group=a[b]});g.column.prototype.drawPoints.call(this);this.colorAttribs&&a.chart.styledMode&&this.points.forEach(function(a){a.graphic&&a.graphic.css(this.colorAttribs(a))},this);a.options.allowDrillToNode&&c.forEach(function(c){c.graphic&&
(c.drillId=a.options.interactByLeaf?a.drillToByLeaf(c):a.drillToByGroup(c))})},onClickDrillToNode:function(a){var c=(a=a.point)&&a.drillId;x(c)&&(a.setState(""),this.drillToNode(c))},drillToByGroup:function(a){var c=!1;1!==a.node.level-this.nodeMap[this.rootNode].level||a.node.isLeaf||(c=a.id);return c},drillToByLeaf:function(a){var c=!1;if(a.node.parent!==this.rootNode&&a.node.isLeaf)for(a=a.node;!c;)a=this.nodeMap[a.parent],a.parent===this.rootNode&&(c=a.id);return c},drillUp:function(){var a=this.nodeMap[this.rootNode];
a&&x(a.parent)&&this.drillToNode(a.parent)},drillToNode:function(a,c){var b=this.nodeMap[a];this.idPreviousRoot=this.rootNode;this.rootNode=a;""===a?this.drillUpButton=this.drillUpButton.destroy():this.showDrillUpButton(b&&b.name||a);this.isDirty=!0;p(c,!0)&&this.chart.redraw()},showDrillUpButton:function(a){var c=this;a=a||"\x3c Back";var b=c.options.drillUpButton,e,f;b.text&&(a=b.text);this.drillUpButton?(this.drillUpButton.placed=!1,this.drillUpButton.attr({text:a}).align()):(f=(e=b.theme)&&e.states,
this.drillUpButton=this.chart.renderer.button(a,null,null,function(){c.drillUp()},e,f&&f.hover,f&&f.select).addClass("highcharts-drillup-button").attr({align:b.position.align,zIndex:7}).add().align(b.position,!1,b.relativeTo||"plotBox"))},buildKDTree:y,drawLegendSymbol:b.LegendSymbolMixin.drawRectangle,getExtremes:function(){e.prototype.getExtremes.call(this,this.colorValueData);this.valueMin=this.dataMin;this.valueMax=this.dataMax;e.prototype.getExtremes.call(this)},getExtremesFromAll:!0,bindAxes:function(){var a=
{endOnTick:!1,gridLineWidth:0,lineWidth:0,min:0,dataMin:0,minPadding:0,max:100,dataMax:100,maxPadding:0,startOnTick:!1,title:null,tickPositions:[]};e.prototype.bindAxes.call(this);b.extend(this.yAxis.options,a);b.extend(this.xAxis.options,a)},utils:{recursive:z}},{getClassName:function(){var a=b.Point.prototype.getClassName.call(this),c=this.series,d=c.options;this.node.level<=c.nodeMap[c.rootNode].level?a+=" highcharts-above-level":this.node.isLeaf||p(d.interactByLeaf,!d.allowDrillToNode)?this.node.isLeaf||
(a+=" highcharts-internal-node"):a+=" highcharts-internal-node-interactive";return a},isValid:function(){return this.id||n(this.value)},setState:function(a){b.Point.prototype.setState.call(this,a);this.graphic&&this.graphic.attr({zIndex:"hover"===a?1:0})},setVisible:g.pie.prototype.pointClass.prototype.setVisible})})(q,C)});
//# sourceMappingURL=treemap.js.map
