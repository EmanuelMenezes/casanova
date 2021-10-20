import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";

const routes: Routes = [
  {
    path: "imoveis",
    loadChildren: () =>
      import("./imoveis/imoveis.module").then((m) => m.ImoveisModule),
  },
  {
    path: "clientes",
    loadChildren: () =>
      import("./clientes/clientes.module").then((m) => m.ClientesModule),
  },
  {
    path: "corretores",
    loadChildren: () =>
      import("./corretores/corretores.module").then((m) => m.CorretoresModule),
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule { }
