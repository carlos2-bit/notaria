window.addEventListener('DOMContentLoaded', () =>{
    const search = document.querySelector('#search')
    const tableContainer = document.querySelector('#results tbody')
    const resultsContainer = document.querySelector('resultsContainer')
    const errorContainer = document.querySelector('.errors-container')
    let search_criteria = ''

    if(search){
        search.addEventListener('input', event =>{
            search_criteria = event.target.value.toUpperCase()
            showResults()
        })
    }

    //enviar peticion usando fetch
    const searchData = async () => {
        let searchData = new FormData()
        searchData.append('search_criteria', search_criteria)

        try {
            const response = await fetch('./php/search_data.php', {
                method: "POST", 
                body: searchData
            })
            return response.json()
        }   catch (error){
            alert(`${'Hubo error Razones: '}${error.message}`)
            console.log(error)
        }


        const showResults = () => {
            searchData()
            .then(dataResults =>{
                console.log(dataResults)
                tableContainer.innerHTML = ''
                if(typeof dataResults.data !== 'undefined' && !dataResults.data){
                    errorContainer.style.display='block'
                    errorContainer.querySelector('p'),innerHTML = 
                    `No hay Resultados : <span class="bold">${search_criteria}</span>`
                    resultsContainer.style.display = 'none'
                }else{
                    resultsContainer.style.display = 'block'
                    errorContainer.style.display = 'none'

                    for (const iterator of object){
                        const row = document.createElement('tr')
                        row.innerHTML = 
                        `
                        <td>${expediente}</td>



                        `
                        tableContainer.appendChild(row)
                    }
                }
            })
            
        }
    }

    showResults()
})