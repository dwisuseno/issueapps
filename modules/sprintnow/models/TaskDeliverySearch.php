<?php

namespace app\modules\sprintnow\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sprintnow\models\TaskDelivery;

/**
 * app\modules\backlog\models\TaskDeliverySearch represents the model behind the search form about `app\modules\backlog\models\TaskDelivery`.
 */
 class TaskDeliverySearch extends TaskDelivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_sprint', 'id_aplikasi', 'id_pic', 'id_platform', 'id_model_menu', 'is_tested_by_vendor', 'is_tested_by_owner', 'id_status', 'id_prioritas', 'estimated_day'], 'integer'],
            [['issue', 'actual_finish_date', 'deployment', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TaskDelivery::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pagesize' => 10 ],
            // 'pagesize' => 10,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(isset($_SESSION["project"]) && $_SESSION["project"] != 'Default'){
            $query->andWhere('id_modul = '.$_SESSION['id'].'');
        } 

        $query->andWhere('id_status = 2');
        $query->andWhere('deleted = 0');
        $query->orderBy(['id_prioritas' => SORT_DESC]);

        $query->andFilterWhere([
            'id' => $this->id,
            'id_sprint' => $this->id_sprint,
            'id_aplikasi' => $this->id_aplikasi,
            'id_pic' => $this->id_pic,
            'id_platform' => $this->id_platform,
            'id_model_menu' => $this->id_model_menu,
            'is_tested_by_vendor' => $this->is_tested_by_vendor,
            'is_tested_by_owner' => $this->is_tested_by_owner,
            'id_status' => $this->id_status,
            'id_prioritas' => $this->id_prioritas,
            'estimated_day' => $this->estimated_day,
        ]);

        $query->andFilterWhere(['like', 'issue', $this->issue])
            ->andFilterWhere(['like', 'actual_finish_date', $this->actual_finish_date])
            ->andFilterWhere(['like', 'deployment', $this->deployment])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
