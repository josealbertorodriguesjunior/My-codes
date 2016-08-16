
package prova;

 //@author jessica

public class Prova {

    public static void main(String[] args) {

        //CRIANDO UM OBJETO pessoa(instanciação)
        
        Pessoa minhaPessoa = new Pessoa();
        
        minhaPessoa.setCodigo(001);
        minhaPessoa.setNome("João");
        minhaPessoa.setEndereco("Rua B ");
        minhaPessoa.setBairro("Galileu");
        minhaPessoa.setCidade("Guara");
        minhaPessoa.setUf("SP");
        minhaPessoa.setCelular("9000-0000");
        minhaPessoa.setTelefone("3800-0000");
        
        //CHAMANDO O MÉTODO mostrarTelefone
        
        System.out.println(minhaPessoa.mostrarTelefone());
       
    }
    
}
