using MetroSet_UI.Forms;
using System;
using System.Data;
using System.Windows.Forms;

namespace painel_supermercado
{
    public partial class frm_login : MetroSetForm
    {
        public frm_login()
        {
            InitializeComponent();
        }

        ConexaoBD bd = new ConexaoBD(); //começa a conexão com o bd
        string sql;


        private void btn_cadastrar_Click(object sender, EventArgs e) // abre outra janela (no caso, o form de cadastro)
        {
            this.Visible = false;
            btn_cancelar cad = new btn_cancelar();
            cad.ShowDialog();
        }


        private void btn_entrar_Click_1(object sender, EventArgs e)
        {
            DataTable buscar = new DataTable();

            string email = txt_email.Text, senha = txt_senha.Text; //definicao de variavel

            sql = string.Format("select * from funcionario where email = '{0}' and senha = '{1}'", txt_email.Text, txt_senha.Text); //comandos de select bd
            buscar = bd.ConsultarTabelas(sql); //executar os comandos da linha 41 no bd

            if (email == "" || senha == "") //verifica se tem alguma coisa digitada nos campos
            {
                MessageBox.Show("E-mail ou(e) senha inválidos!", "Campos inválidos", MessageBoxButtons.OK, MessageBoxIcon.Error);
                txt_email.Focus();
                return; // não deixa com que o programa continue a execução (medida de segurança)
            }
            else
            {
                if (buscar.Rows.Count > 0) //faz a busca por quantidade de linhas no bd
                {
                    this.Visible = false;
                    frm_inicio cad = new frm_inicio();
                    cad.ShowDialog();
                }
                else
                {
                    MessageBox.Show("E-mail ou(e) senha incorretos!", "Erro de login", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    txt_email.Clear();
                    txt_senha.Clear(); //limpa os campos
                    txt_email.Focus();
                    return;
                }
            }
        }

        private void btn_cadastrar_Click_1(object sender, EventArgs e)
        {
            this.Visible = false;
            btn_cancelar cad = new btn_cancelar();
            cad.ShowDialog();
        }

        private void btn_cancelar_Click_1(object sender, EventArgs e)
        {
            this.Close(); //fecha a janela
        }
    }
}
