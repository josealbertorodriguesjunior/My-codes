
package prova;

/**
 *
 * @author jessica
 */
public class Pessoa {
    
    //ATRIBUTOS ENCAPSULADOS
    private int codigo;
    private String nome, endereco, bairro, cidade, uf, telefone, celular;
    
    //MÉTODOS ESPECIAIS DE ACESSO 
    
    //MÉTODOS SETTERS
    public void setCodigo(int codigo) {
        this.codigo = codigo;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }

    public void setBairro(String bairro) {
        this.bairro = bairro;
    }

    public void setCidade(String cidade) {
        this.cidade = cidade;
    }

    public void setUf(String uf) {
        this.uf = uf;
    }

    public void setTelefone(String telefone) {
        this.telefone = telefone;
    }

    public void setCelular(String celular) {
        this.celular = celular;
    }
    
    //MÉTODOS GETTERS
    public String getNome() {
        return nome;
    }

    public String getEndereco() {
        return endereco;
    }

    public String getBairro() {
        return bairro;
    }

    public String getCidade() {
        return cidade;
    }

    public String getUf() {
        return uf;
    }

    public String getTelefone() {
        return telefone;
    }

    public String getCelular() {
        return celular;
    }
 
    //ASSINANDO O MÉTODO mostrarTelefone
    public String mostrarTelefone(){
        return "Nome......: " +this.nome+ "\n"+
                "Telefone.....: " +this.telefone+ "\n"+
                "Celular.....: " +this.celular+ "\n";
    }
    
   
}
