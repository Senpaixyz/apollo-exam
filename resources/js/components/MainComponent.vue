<template>
  <div class="container">
      <div class="row justify-content-center my-5">
          <div class="col-6">
              <span>Breakdown Data</span>
              <spiral-component :string_data="breakdownData"  />
             
          </div>
          <div class="col-6">
              <span>Random Names</span>
              <spiral-component :string_data="randomData"  />
         
          </div>

      </div>
  </div>
</template>

<script>
  export default {
      props: ['random_data'],

      data(){
        return {
          random: this.random_data,
          randomData: "",
          breakdownData: ""
        }
      },
      mounted(){
          let randomData = "";
          let breakdownData =  "";
          this.random.forEach(function(item){
              randomData += `${item.value} `;

              item.breakdown.forEach(function(i){
                breakdownData += `${i.value} `;
              });
          });

          this.randomData = randomData;
          this.breakdownData = breakdownData;
      }

  }
</script>
