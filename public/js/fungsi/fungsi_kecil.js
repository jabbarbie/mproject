import page from './info.js'
function activeMenu(){
    const menu = document.getElementsByClassName(page.currentPage)
    
    // if (menu)
    // const ulx = menu[0].parentElement.parentElement

    // console.log(page.currentPage)
    // console.log(menu)
    if (menu[0].dataset.parent){
       var menuid = menu[0].dataset.parent
      document.getElementById(menuid).classList.add('menu-open')
    }
    menu[0].classList.add("active")

    // console.log(menu[0].parentElement.parentElement)
    // if (ulx.classList.contains('nav-treeview')){
    //   ulx.classList.add('menu-open')
    // }else{
    //   menu[0].classList.add("active")
    // }

    // if(menu.length == 1){
    //   menu[0].classList.add("active")
    // }else if(menu.length > 1){
    //   menu[0].parentElement.classList.add("menu-open")

    // }
}
export function objectFromFormData(formData) {
  const values = {};
  for (let [key, value] of formData.entries()) {
    if (values[key]) {
      if ( ! (values[key] instanceof Array) ) {
        values[key] = new Array(values[key]);
      }
      values[key].push(value);
    } else {
      values[key] = value;
    }
  }
  return values;
}
export function formDataToJSON(formData){
  const d = objectFromFormData(formData)
  return JSON.stringify(d)
  // return JSON.parse(JSON.stringify(d))
  // return d
}

export function objectToURL(params)
{
  console.log(params);
  
  // let queryString = Object.keys(params).map(key => key + '=' + params[key]).join('&')
  let queryString = Object.keys(params).map(key => params[key]).join('/')
  return queryString
}

// Baru //
export function objectToArray(keterangan)
{
  let data = new Array
  if(typeof(keterangan) == 'object'){
      Object.entries(keterangan).forEach(e => {
          data.push(e)
      })
      return data
  }else{
    return false
  }
}

export function arrayToList(data){
  let ul  = document.createElement("ul")
  data.forEach(d => {
    let li = document.createElement("li")
    li.appendChild(document.createTextNode(d[1]))

    ul.appendChild(li)
  })
  return ul
}



activeMenu()
