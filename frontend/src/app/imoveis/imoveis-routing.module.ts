import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { FormularioImoveisComponent } from "./formulario-imoveis/formulario-imoveis.component";
import { ListagemImoveisComponent } from "./listagem-imoveis/listagem-imoveis.component";

const routes: Routes = [
  {
    path: "",
    redirectTo: "lista"
  },
  {
    path: "lista",
    component: ListagemImoveisComponent
  },
  {
    path: "novo",
    component: FormularioImoveisComponent
  },
  {
    path: ":id/editar",
    component: FormularioImoveisComponent
  },
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ImoveisRoutingModule { }
