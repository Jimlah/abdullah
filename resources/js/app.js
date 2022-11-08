import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.document.addEventListener('alpine:init', () => {
    window.Alpine.directive('datatable', (el, {value, modifiers, expression}, {Alpine, evaluate, cleanup, effect}) => {
       Alpine.data('datatable', (url)=>({
           page: 1,
           perPage: 10,
           columns: {},
           getCurrentPage(){
             return this.page;
           },
           items: [],
           getItem(value){
               return this.items[value]
           },
           search: '',
           filters: {},
           setFilter(filter, value=''){
             this.filters[filter]  = value;
           },
           send(){
               const filters =Object.entries(this.filters).map(v=> [`filters[${v[0]}]`, v[1]]).reduce((acc, val)=>({...acc, [val[0]]: val[1]}), {});
               const query = new URLSearchParams({
                   search: this.search,
                   perPage: this.perPage,
                   page: this.page,
                   ...filters})
               fetch(url+'?' + query, {
                   method: 'GET'
               })
                   .then(response => response.json())
                   .then((result) => {
                       this.items = result;
                   })
           },
           init(){
               this.send()
           },
           filter: (value) => ({
               ['x-model']: 'filters.' + value,
               ['@keyup.enter'](){
                   this.send();
               }
           }),
           searchable: (value) => ({
               ['x-model']: 'search',
               ['@keyup.enter'](){
                   this.send();
               }
           }),
           itemloop: {
               ['x-for'](){
                   return 'item in ' + this.items;
               },
           },
           currentpage: {
               ['x-text'](){
                   return this.page;
               },
           },
           itemsperpage: {
               ['x-model']: 'perPage',
               ['x-on:change'](){
                   this.send();
               }
           },
           next(){
             this.page++
           },
           prev(){
               this.page--
           },
           setPageNumber(value){
               this.page = value
               this.send()
           },
           nextPage: {
               ['x-on:click'](){
                   this.next()
                   this.send()
               }
           },
           prevPage: {
               ['x-on:click'](){

                   if(this.page > 1)
                   {
                       this.prev()
                       this.send()
                   }
               }
           },
           setPage: (value)=>({
               ['x-on:click'](){
                   this.setPageNumber(value);
               }
           }),
           header: {
               ['x-init'](){
                   this.columns = Array.from(this.$el.querySelectorAll('th')).map(v=>v.cellIndex).reduce((acc, v)=> {
                       if(v > 5)
                       {
                           return {...acc, [v]: false}
                       }
                       return {...acc, [v]:true }
                   }, {})
               },
               // ['x-id'](){
               //     return this.$id('table-head')
               // }
           },
           column: {
               ['x-show'](){
                   return this.columns[this.$el.cellIndex]
               }
           },
           bodycolumn: {
               ['x-show']: 'columns[$el.cellIndex]'
           }
       }));


       if(value === null)
       {
           el.setAttribute('x-data', 'datatable("'+expression+'")')
       }

        if(value === 'search')
        {
            el.setAttribute('x-bind', 'searchable')
        }

        if(value === 'filter')
        {
            const name = evaluate(expression);
            el.setAttribute('x-bind', "filter('"  + name+ "')")
        }

        if(value === 'items')
        {
            el.setAttribute('x-for', "item in items." + expression ?? '')
        }

        if(value === 'perPage')
        {
            el.setAttribute('x-bind', "itemsperpage")
        }

       if(value === 'currentpage')
       {
           el.setAttribute('x-bind', 'currentpage')
       }

        if(value === 'perpage')
        {
            el.setAttribute('x-bind', 'itemsperpage')
        }

        if(value === 'prev')
        {
            el.setAttribute('x-bind', 'prevPage')
        }

        if(value === 'next')
        {
            el.setAttribute('x-bind', 'nextPage')
        }

        if(value === 'setpage')
        {
            const number = evaluate(expression);
            el.setAttribute('x-on:click', "setPageNumber("+number+")");
        }

        if(value === 'header')
        {
            if(modifiers.length === 0)
            {
                el.setAttribute('x-bind', 'header')
            }

            if(modifiers.includes('column'))
            {
                el.setAttribute('x-bind', 'column')
            }
        }

        if(value === 'body')
        {
            if(modifiers.includes('column'))
            {
                el.setAttribute('x-show', 'columns[$el.cellIndex]')
            }
        }

        if(value === 'columns')
        {
            if(modifiers.includes('list'))
            {
                el.setAttribute('x-for', '(item, key) in columns')
            }

            if(modifiers.includes('item'))
            {
                el.setAttribute('x-model', 'columns[key]')
            }
        }
    });
})

window.Alpine.start();
