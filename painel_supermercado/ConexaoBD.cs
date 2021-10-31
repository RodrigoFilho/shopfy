using MySql.Data.MySqlClient;
using System.Data;

namespace painel_supermercado
{
    class ConexaoBD
    {
        private MySqlConnection conexao;
        public void ConectarBD() //conectar no bd | passar as informações do bd
        {
            conexao = new MySqlConnection("Persist Security Info = false; " +
                                          "server = localhost; " +
                                          "database = supermercado_bd; " +
                                          "uid = root; pwd =;" +
                                          "SslMode = none;");
            conexao.Open(); //abrir conexao com o bd
        }
        public void AlterarTabelas(string sql) //alterar as tabelas
        {
            ConectarBD();
            MySqlCommand comandos = new MySqlCommand(sql, conexao);
            comandos.ExecuteNonQuery();
            conexao.Close();
        }
        public DataTable ConsultarTabelas(string sql) //consultar as tabelas
        {
            ConectarBD();
            MySqlDataAdapter consulta = new MySqlDataAdapter(sql, conexao);
            DataTable resultado = new DataTable();
            consulta.Fill(resultado);
            conexao.Close();
            return resultado;
        }


    }
}
