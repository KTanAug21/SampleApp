<div class="flex space-x-7 ">
   
    @foreach( $filters as $key=> $filter )
     
        <livewire:filter
          :key="$key.now()"
          :label="$filter['label']"
          :options="$filter['options']"
          :value="$filter['value']"
        />
    @endforeach     
</div>
