<form action="{{ route($routerName, $params ?? '') }}" method="get">

    {{-- <div class="relative mb-4 xl:w-96">
        <input type="filter"
            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
            placeholder="Procurar" aria-label="Search" aria-describedby="button-addon1"
           />

        <!--Search button-->

    </div> --}}

    <div class="relative mb-4 xl:w-96">
        <input
          type="search"
          class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
          id="exampleSearch"
          placeholder="Pesquisar Usuário"
          value="{{ request('filter')}}"  name="filter"/>
      </div>


</form>
