var vm=new Vue({
    el:"#role",
    data:{
        items:[]
    },
    mounted(){
        this.index();
    },
    methods:{
        index:function () {
            this.$http.get('/role/lists').then(function (res) {
                // console.log(res.data);
                this.items = res.data.data;
                // JavaScript代码区域
                layui.use('element', function(){
                    var element = layui.element;
                    element.init();
                });

            })
        }
    }

});