import pandas as pd
import seaborn as sns

#The arguments are wrong for the function, where "data" and "genes" should be store the information as variables. List is also a built-in function in Python and can NOT represent data. The function "list" must be executed either inside or outside the function, but NOT as an argument. 
def plot_gene_expression_boxplot(data:pd.DataFrame,genes:list):
    ms_columns = [col for col in data.columns if col.startswith("ms")]
    control_columns = [col for col in data.columns if col.startswith("control")]

   #The dataframe below is empty, which means there is no data to generate the box plot, where the solution is to add data to the dataframe.
    plot_data = pd.DataFrame()

    gene_data = data.loc[data["SYMBOL"].isin(genes)]
    ms_values = gene_data[ms_columns].stack()
    control_values = gene_data[control_columns].stack()
    #THe original code had a syntax error, where a parenthesis was missing in line 15. The solution is to add a new parenthesis to close it. 
    val = int((len(ms_values) + len(control_values)) / len(genes))
    gene_plot_data = pd.DataFrame(
        {
            "Expression_Level": pd.concat([ms_values, control_values]),
            "Sample_Type": ["MS"] * len(ms_values) + ["Control"] * len(control_values),
            "Gene": [gene for gene in genes] * val,
        }
    )

    sns.boxplot(data=gene_plot_data, x="Gene", y="Expression_Level", hue="Sample_Type")
    plt.show()

#The function was never called for in the original code, which means it would not generate the box-plot. 
plot_gene_expression_boxplot